<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Symptom;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $diseases = Disease::with('symptoms')->get();
        return view('admin.rule.index', compact('diseases'));
    }

    public function edit(int $disease_id)
    {
        $disease = Disease::with('symptoms')->findOrFail($disease_id);
        $symptoms = Symptom::orderBy('code')->get()->keyBy('code');
        return view('admin.rule.edit', compact('disease','symptoms'));
    }

    public function update(int $disease_id, Request $request)
    {
        $disease = Disease::findOrFail($disease_id);

        $disease_symptom = [];
        foreach ($request['symptom_id'] as $i => $val)
        {
            $disease_symptom[$val] = ['value'=>$request['value'][$i]];
        }
        $disease->symptoms()->sync($disease_symptom);

        return redirect()->back()->with('success','Aturan diperbarui!');
    }
}
