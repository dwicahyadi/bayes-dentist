@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center my-4">
                    <img class="rounded-circle"
                         width="128px"
                        src="{{ auth()->user()->picture_url ?? 'https://ui-avatars.com/api/?background=random&color=fff&name='.auth()->user()->name }}" alt="picture_url">
                    <h1>{{ auth()->user()->name }}</h1>
                </div>
                <div class="card shadow-sm mb-2">
                    <div class="card-header bg-white">
                        <span class="card-title"><i class="fa fa-user"></i> Profile</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update',auth()->user()) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ auth()->id() }}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-right">Nama</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-right">No. Handphone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? auth()->user()->phone }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? auth()->user()->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-right">Alamat</label>

                                <div class="col-md-6">
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address') ?? auth()->user()->address }}</textarea>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-4 d-flex justify-content-end">
                                    <a class="btn btn-light mx-2" href="{{ route('user.index') }}">Kembali</a>
                                    <input type="submit" class="btn btn-primary mx-2" value="Simpan">
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
                <div class="card shadow-sm mb-2">
                    <div class="card-header bg-white">
                        <span class="card-title"><i class="fa fa-key"></i> Keamanan</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update_password',auth()->user()) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-4 d-flex justify-content-end">
                                    <a class="btn btn-light mx-2" href="{{ route('user.index') }}">Kembali</a>
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
