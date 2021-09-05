<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use App\Models\Disease;
use App\Models\Symptom;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if (!$request['start_date'] || !$request['end_date'])
            return view('admin.report.create');

        $diagnoses = Diagnose::query()
            ->with(['user','disease','symptoms'])
            ->whereBetween('created_at', [$request['start_date'], $request['end_date']])
            ->get();
        $diseases = Disease::query()
            ->withCount(['diagnoses' => function($q) use($request){
                return $q->whereBetween('created_at', [$request['start_date'], $request['end_date']]);
            }])
            ->get()
            ->pluck('diagnoses_count','name')
            ->toArray();
        $symptoms = Symptom::query()
            ->withCount(['diagnoses' => function($q) use($request) {
                return $q->whereBetween('diagnoses.created_at', [$request['start_date'], $request['end_date']]);
            }])
            ->get()
            ->pluck('diagnoses_count','code')
            ->toArray();

        $diseases_chart = $this->generateChartdata($diseases);
        $symptoms_chart = $this->generateChartdata($symptoms);
        return view('admin.report.index',compact('diagnoses', 'symptoms_chart','diseases_chart'));
    }

    private function generateChartdata(array $data)
    {

        foreach ($data as $key => $value)
        {
            $labels[] = $key;
            $values[] = $value;
            $colors[] = "rgb(".rand(155,200).",".rand(155,200).",".rand(155,200).")";
        }
        $chart = [
            'label' => json_encode($labels),
            'value' => json_encode($values),
            'colors' => json_encode($colors)
        ];

        return $chart;
    }
}
