<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use App\Models\Disease;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin)
        {
            $stats = [
                'users' => User::count(),
                'symptoms' => Symptom::count(),
                'diseases' => Disease::count(),
                'diagnoses' => Diagnose::count(),
            ];

            $diseases = Disease::withCount('diagnoses')->whereHas('diagnoses')->get();
            return view('admin.home', compact('stats','diseases'));
        }
        return view('home');
    }

    public function diagnose()
    {
        $symptoms = Symptom::orderBy('code')->get()->keyBy('code');
        return view('diagnose', compact('symptoms'));
    }
}
