@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Penyakit</li>
                </ol>
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between">
                        <span class="card-title">Daftar Hasil Diagnosa</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Tanggal/Waktu</th>
                                <th>Pengguna</th>
                                <th>Penyakit</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($diagnoses as $diagnose)
                                <tr>
                                    <td>{{ $diagnose->created_at }}</td>
                                    <td>{{ $diagnose->user->name }}</td>
                                    <td>{{ $diagnose->disease->name ?? 'kosong' }}</td>
                                    <td>Tampilkan</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center"> <a class="btn btn-primary" href="{{ route('disease.create') }}">Tambah Penyakit Baru</a> </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
