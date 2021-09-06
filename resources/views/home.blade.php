@extends('layouts.user')

@section('content')
    <div class="bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4 class="text-white mt-4">Selamat datang</h4>
                    <h2 class="text-white mt-4">{{ auth()->user()->name }}</h2>
                </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-center flex-wrap">
                        <a href="{{ route('diagnose.create') }}" class="my-2 mx-2 btn btn-outline-light" style="width: 8rem">
                            <img src="{{ asset('images/icons/diagnose.png') }}" alt="diagnose.png" style="width: 36px"><br>
                            Diagnosa
                        </a>

                        <a href="{{ route('history') }}" class="my-2 mx-2 btn btn-outline-light" style="width: 8rem">
                            <img src="{{ asset('images/icons/diagnose_history.png') }}" alt="diagnose.png" style="width: 36px"><br>
                            Riwayat
                        </a>

                        <a href="{{ route('diseases_information') }}" class="my-2 mx-2 btn btn-outline-light" style="width: 8rem">
                            <img src="{{ asset('images/icons/disease.png') }}" alt="diagnose.png" style="width: 36px"><br>
                            Penyakit Gigi
                        </a>

                        <a href="" class="my-2 mx-2 btn btn-outline-light" style="width: 8rem">
                            <img src="{{ asset('images/icons/user.png') }}" alt="diagnose.png" style="width: 36px"><br>
                            Profile
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <strong class="my-4 text-primary">Diagnosa Terakhir</strong>
                @forelse($diagnoses as $diagnose)
                    <a href="{{ route('diagnose.show', $diagnose) }}" style="text-decoration: none" class="text-dark">
                        <div class="card shadow-sm mt-2">
                            <div class="card-body d-flex align-items-center">
                                <div class="mr-4">
                                    <img src="{{ asset('images/icons/gum.png') }}" alt="gum.png" style="width: 36px"><br>
                                </div>
                                <div>
                                    <span>{{ $diagnose->created_at }}</span><br>
                                    <strong>{{ $diagnose->disease->name ?? 'Tidak tahu' }}</strong><br>
                                    <small>@foreach($diagnose->symptoms as $symptom) {{ $symptom->name }}, @endforeach </small>
                                </div>

                            </div>
                        </div>
                    </a>
                @empty
                    <div class="mt-4">
                        <h4 class="text-muted">Belum ada riwayat diagnosa...</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
