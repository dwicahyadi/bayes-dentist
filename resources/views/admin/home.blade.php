@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h2>{{ number_format($stats['users']) }}</h2>
                            <span>Total Pengguna</span>
                        </div>
                        <div class="w-25">
                            <img class="img-fluid" src="{{ asset('images/icons/user.png') }}" alt="user.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h2>{{ number_format($stats['diagnoses']) }}</h2>
                            <span>Total Diagnosa</span>
                        </div>
                        <div class="w-25">
                            <img class="img-fluid" src="{{ asset('images/icons/diagnose.png') }}" alt="user.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h2>{{ number_format($stats['diseases']) }}</h2>
                            <span>Penyakit</span>
                        </div>
                        <div class="w-25">
                            <img class="img-fluid" src="{{ asset('images/icons/disease.png') }}" alt="user.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h2>{{ number_format($stats['symptoms']) }}</h2>
                            <span>Gejala</span>
                        </div>
                        <div class="w-25">
                            <img class="img-fluid" src="{{ asset('images/icons/symptom.png') }}" alt="user.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Statistik Penyakit Terdiagnosa</h5>
                        <table class="table mt-2">
                            <thead>
                            <tr>
                                <th>Penyakit</th>
                                <th>Total Kemunculan</th>
                                <th>Probabilitas</th>
                                <th>%</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php($total = $diseases->sum('diagnoses_count'))
                            @foreach($diseases as $disease)
                                <tr>
                                    <td>{{ $disease->name }}</td>
                                    <td>{{ $disease->diagnoses_count }}</td>
                                    <td>{{ number_format($disease->diagnoses_count/$total,3) }}</td>
                                    <td>{{ number_format($disease->diagnoses_count/$total*100,3) }}%</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
