<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use App\Models\Disease;
use App\Models\Symptom;
use App\Services\NaiveBayesService;
use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    public function index()
    {
        $diagnoses = Diagnose::with(['user','disease'])->get();
        return view('admin.diagnose.index',compact('diagnoses'));
    }
    public function store(Request $request)
    {
        $symptoms = Symptom::whereIn('id', $request['symptom_id'])->get();
        $diagnose = Diagnose::create([
            'user_id' => auth()->id(),
        ]);

        $diagnose_symptom = [];
        foreach ($request['symptom_id'] as $i => $val)
        {
            $diagnose_symptom[$val] = ['value'=>1];
        }
        $diagnose->symptoms()->sync($diagnose_symptom);

        $data = NaiveBayesService::predict($request['symptom_id']);

        if (!$data)
            return redirect()->back()->with('error','Tidak ada kriteria yang terpenuhi');

        $diagnose->update(['disease_id' => $data['result']]);

        return redirect(route('diagnose.show', ['diagnose'=>$diagnose]));
    }

    public function show(Diagnose $diagnose)
    {
        $symptom_ids =  $diagnose->symptoms()->pluck('symptom_id')->toArray();
        $data = NaiveBayesService::predict($symptom_ids);
        return view('diagnose_result',compact('diagnose','data'));
    }
}
