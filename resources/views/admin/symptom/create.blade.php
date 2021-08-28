@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('symptom.index') }}">Gejala</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <span class="card-title">Form Tambah Gejala</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('symptom.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-right">Kode Gejala</label>

                                <div class="col-md-4">
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-right">Gejala</label>

                                <div class="col-md-6">
                                    <textarea id="name" class="form-control @error('name') is-invalid @enderror" name="name" required>{{ old('name') }}</textarea>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-4 d-flex justify-content-end">
                                    <a class="btn btn-light mx-2" href="{{ route('symptom.index') }}">Kembali</a>
                                    <input type="submit" class="btn btn-primary mx-2" value="Simpan">
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
