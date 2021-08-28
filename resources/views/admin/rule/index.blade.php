@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Aturan</li>
                </ol>
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between">
                        <span class="card-title">Daftar Aturan</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Penyakit</th>
                                <th>Gejala</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($diseases as $disease)
                                <tr>
                                    <td>{{ $disease->name }}</td>
                                    <td>
                                        @forelse($disease->symptoms as $symptom)
                                            [{{ $symptom->code }}] {{ $symptom->name }}<br>
                                        @empty
                                            <span>Kosong</span>
                                        @endforelse
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-info mx-2" href="{{ route('rule.edit',['disease_id' => $disease->id]) }}">Edit</a>
                                    </td>
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
