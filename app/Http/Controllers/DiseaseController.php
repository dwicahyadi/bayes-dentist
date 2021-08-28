<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiseaseRequest;
use App\Models\Disease;
use App\Models\Symptom;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::all();
        return view('admin.disease.index', compact('diseases'));
    }

    public function create()
    {
        $symptoms = Symptom::all();
        return view('admin.disease.create', compact('symptoms'));
    }

    public function store(StoreDiseaseRequest $request)
    {
        $request->validated();
        $disease = Disease::create([
            'name' => $request['name'],
            'value' => $request['value'],
            'description' => $request['description'],
            'advice' => $request['advice'],
        ]);
        if ($request['continue'])
            return redirect(route('rule.edit',['disease_id'=>$disease->id]))->with('success', 'Penyakit baru ditambahkan!');

        return redirect(route('disease.index'))->with('success', 'Penyakit baru ditambahkan!');
    }

    public function edit(Disease $disease)
    {
        return view('admin.disease.edit', compact('disease'));
    }

    public function update(Disease $disease, StoreDiseaseRequest $request)
    {
        $request->validated();

        $disease->update([
            'name' => $request['name'],
            'value' => $request['value'],
            'description' => $request['description'],
            'advice' => $request['advice'],
        ]);

        return redirect(route('disease.index'))->with('success', 'Penyakit '.$disease->name.' ditambahkan!');
    }

    public function destroy(Disease $disease)
    {
        $disease->delete();
        return redirect(route('disease.index'))->with('success', 'Penyakit '.$disease->name.' dihapus!');
    }
}
