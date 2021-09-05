@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('diagnose.index') }}">Hasil Diagnosa</a></li>
                    <li class="breadcrumb-item active">Hasil Diagnosa ID {{ $diagnose->id }}</li>
                </ol>
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between">
                        <span class="card-title">Hasil Diagnosa</span>
                    </div>
                    <div class="card-body">
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
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-white d-flex justify-content-between">
                        <span class="card-title">Perhitungan Naive bayes</span>
                    </div>

                    <div class="card-body">
                        @include('include.naive-bayes-result')
                    </div>
                </div>

                <a href="{{ route('diagnose.index') }}" class="btn btn-lg btn-link mt-2">Kembali</a>
            </div>
        </div>
    </div>
@endsection
