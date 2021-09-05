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
        $data = NaiveBayesService::predict($request['symptom_id']);

        if (!$data)
            return view('diagnose_failed');

        $diagnose = Diagnose::create([
            'user_id' => auth()->id(),
        ]);

        $diagnose_symptom = [];
        foreach ($request['symptom_id'] as $i => $val)
        {
            $diagnose_symptom[$val] = ['value'=>1];
        }
        $diagnose->symptoms()->sync($diagnose_symptom);


        $diagnose->update(['disease_id' => $data['result']]);

        return redirect(route('diagnose.show', ['diagnose'=>$diagnose]));
    }

    public function show(Diagnose $diagnose)
    {
        $symptom_ids =  $diagnose->symptoms()->pluck('symptom_id')->toArray();
        $data = NaiveBayesService::predict($symptom_ids);
        if (!auth()->user()->is_admin)
            return view('diagnose_result',compact('diagnose','data'));

        return view('admin.diagnose.show',compact('diagnose','data'));
    }
}
