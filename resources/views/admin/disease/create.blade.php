@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('disease.index') }}">Penyakit</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <span class="card-title">Form Tambah Penyakit</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('disease.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-right">Penyakit</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="value" class="col-md-2 col-form-label text-right">Bobot</label>

                                <div class="col-md-2">
                                    <input id="value" type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required step="0.01">

                                    @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted">Nilai ini menunjukan rasio seberapa sering penyakit ini ditemukan. Nilai ini didapatkan dari seorang Pakar.</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-right">Deskripsi</label>

                                <div class="col-md-8">
                                    <textarea id="description" rows="10" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="advice" class="col-md-2 col-form-label text-right">Saran</label>

                                <div class="col-md-8">
                                    <textarea id="advice" rows="10" class="form-control @error('advice') is-invalid @enderror" name="advice" required>{{ old('advice') }}</textarea>

                                    @error('advice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-2">
                                    <label><input type="checkbox" name="continue"> Lanjutkan kelola gejala dan atusan setalh data penyakit berhasil disimpan.</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 offset-4 d-flex justify-content-end">
                                    <a class="btn btn-light mx-2" href="{{ route('disease.index') }}">Kembali</a>
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
