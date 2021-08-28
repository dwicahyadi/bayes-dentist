@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Gejala</li>
                </ol>
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between">
                        <span class="card-title">Daftar Gejala</span>
                        <a class="btn btn-primary" href="{{ route('symptom.create') }}">Tambah Gejala Baru</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Gejala</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($symptoms as $symptom)
                                <tr>
                                    <td>{{ $symptom->code }}</td>
                                    <td>{{ $symptom->name }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-info mx-2" href="{{ route('symptom.edit',['symptom'=>$symptom]) }}">Edit</a>
                                        <form action="{{ route('symptom.destroy', $symptom) }}" method="post"  onsubmit="return confirm('Yakin hapus gejala ini?');">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center"> <a class="btn btn-primary" href="{{ route('symptom.create') }}">Tambah Gejala Baru</a> </td>
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
