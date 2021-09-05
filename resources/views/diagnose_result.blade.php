@extends('layouts.user')

@section('content')
    <div class="bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="background-image: url(../images/icons/diagnose_result.png);
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 128px 128px;
            ">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h5 class="mt-4 text-white">Berdasarkan gejala dan prediksi kamu mengalami :</h5>
                        <h1 class="h1 text-white">{{ $diagnose->disease->name }}</h1>
                        <small class="text-muted">Nilai Bayes : {{ $data['bayes_final_value'] }}</small>
                        <div class="mt-4">
                            <a href="{{ route('diagnose.create') }}" class="btn btn-outline-light rounded-pill">Diagnosa Baru</a>
                            <a href="{{ route('history') }}" class="btn btn-outline-light rounded-pill">Riwayat Diagnosa</a>
                        </div>
                    </div>

                    <ul class="nav nav-tabs nav-fill mt-4" id="myTab" role="tablist">
                        <li class="nav-item" >
                            <a class="nav-link active  text-dark" id="result-tab" data-toggle="tab" href="#result" role="tab" aria-controls="result" aria-selected="true">
                                <i class="fa fa-stethoscope"></i> <span class="d-none d-lg-inline-block">Diagnosa</span>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link text-dark" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false">
                                <i class="fa fa-info-circle"></i> <span class="d-none d-lg-inline-block">Informasi Penyakit</span>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link text-dark" id="advice-tab" data-toggle="tab" href="#advice" role="tab" aria-controls="advice" aria-selected="false">
                                <i class="fa fa-plus"></i> <span class="d-none d-lg-inline-block">Saran</span>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link text-dark" id="bayes-tab" data-toggle="tab" href="#bayes" role="tab" aria-controls="bayes" aria-selected="false">
                                <i class="fa fa-calculator"></i> <span class="d-none d-lg-inline-block">NaiveBayes</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="tab-content">

                        <div class="tab-pane active" id="result" role="tabpanel" aria-labelledby="result-tab">
                            <h5 class="mt-4">Hasil Diagnosa</h5>
                            <table class="table">
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{ $diagnose->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Telp</td>
                                    <td>: {{ $diagnose->user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: {{ $diagnose->user->mail }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $diagnose->user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Diagnosa</td>
                                    <td>: {{ $diagnose->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="align-top">Gejala</td>
                                    <td>: @foreach($diagnose->symptoms as $symptom) {{ $symptom->name }}<br>&nbsp; @endforeach </td>
                                </tr>
                                <tr>
                                    <td>Diagnosa</td>
                                    <td>: <strong class="text-primary"><u>{{ $diagnose->disease->name }}</u></strong></td>
                                </tr>
                            </table>
                        </div>

                        <div class="tab-pane" id="information" role="tabpanel" aria-labelledby="information-tab">
                            <h5 class="mt-4">Informasi</h5>
                            <p>{{ $diagnose->disease->description ?? 'Informasi belum di input' }}</p>
                        </div>
                        <div class="tab-pane" id="advice" role="tabpanel" aria-labelledby="advice-tab">
                            <h5 class="mt-4">Saran/Pengobatan</h5>
                            <p>{{ $diagnose->disease->advice ?? 'Informasi belum di input' }}</p>
                        </div>
                        <div class="tab-pane" id="bayes" role="tabpanel" aria-labelledby="bayes-tab">
                            @include('include.naive-bayes-result')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
