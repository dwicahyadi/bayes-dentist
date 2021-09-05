<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSymptomRequest;
use App\Http\Requests\UpdateSymptomRequest;
use App\Models\Symptom;

class SymptomController extends Controller
{
    public function index()
    {
        $symptoms = Symptom::all();
        return view('admin.symptom.index', compact('symptoms'));
    }

    public function create()
    {
        return view('admin.symptom.create');
    }

    public function store(StoreSymptomRequest $request)
    {
        $request->validated();
        Symptom::create([
            'code' => $request['code'],
            'name' => $request['name'],
        ]);

        return redirect(route('symptom.index'))->with('success', 'Gejala baru berhasil ditambahkan!');
    }

    public function edit(Symptom $symptom)
    {
        return view('admin.symptom.edit', compact('symptom'));
    }

    public function update(Symptom $symptom, UpdateSymptomRequest $request)
    {
        $request->validated();
        $symptom->update([
            'name' => $request['name']
        ]);
        return redirect(route('symptom.index'))->with('success', 'Gejala ' . $symptom->code . ' dipebarui!');
    }

    public function destroy(Symptom $symptom)
    {
        if ($symptom->diseases->count())
            return redirect(route('symptom.index'))->with('error', 'Gejala ' . $symptom->code . ' tidak dapat dihapus karena memiliki relasi dengan Penyakit!');
        $symptom->delete();
        return redirect(route('symptom.index'))->with('success', 'Gejala ' . $symptom->code . ' dihapus!');
    }
}
