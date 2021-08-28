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
                        <span class="card-title">Daftar Penyakit</span>
                        <a class="btn btn-primary" href="{{ route('disease.create') }}">Tambah Penyakit Baru</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Penyakit</th>
                                <th>Bobot</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($diseases as $disease)
                                <tr>
                                    <td>{{ $disease->name }}</td>
                                    <td>{{ $disease->value }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-info mx-2" href="{{ route('disease.edit',$disease) }}">Edit</a>
                                        <form action="{{ route('disease.destroy', $disease) }}" method="post"  onsubmit="return confirm('Yakin hapus Penyakit ini?');">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
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
