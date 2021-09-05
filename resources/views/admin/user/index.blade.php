@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Pengguna</li>
                </ol>
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between">
                        <span class="card-title">Daftar Pengguna</span>
                        <a class="btn btn-primary" href="{{ route('user.create') }}">Tambah Pengguna Baru</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped dataTable">
                            <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Nama</th>
                                <th>Nomor Teleppon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td style="width: 4em"><img class="rounded-circle m-2" style="height: 36px" src="{{ $user->picture_url ?? 'https://ui-avatars.com/api/?background=random&color=fff&name='.$user->name }}"  alt="{{ $user->name }}"></td>
                                    <td>{{ $user->name }} @if($user->is_admin) <label class="badge badge-success"><i class="fa fa-key"></i> Admin @endif</label></td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-info mx-2" href="{{ route('user.edit',['user'=>$user]) }}">Edit</a>
                                        <form action="{{ route('user.destroy', $user) }}" method="post"  onsubmit="return confirm('Yakin hapus user {{ $user->name }}?');">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center"> <a class="btn btn-primary" href="{{ route('user.create') }}">Tambah Pengguna Baru</a> </td>
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
