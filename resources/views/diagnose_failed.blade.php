@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron bg-transparent mt-4">
                    <div class="text-center my-4">
                        <i class="fa fa-warning fa-5x text-muted"></i>
                    </div>
                    <h1 class="text-black-50">Tidak Dikethui..</h1>
                    <p class="text-muted">Tidak ditemukan penyakit denga <strong>semua</strong> gejala tersebut.</p>
                    <p class="text-muted">Periksa kembali gejala yang dipilih</p>
                    <a href="{{ route('diagnose.create') }}" class="mt-4 btn btn-block btn-lg btn-primary">DIAGNOSA ULANG</a>
                    <a href="{{ route('diseases_information') }}" class="mt-4 btn btn-block btn-lg btn-link">Pelajari tentang daftar penyakit gigi</a>
                </div>
            </div>
        </div>
    </div>
@endsection
