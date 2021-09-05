@extends('layouts.user')

@section('content')
    <div class="bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="background-image: url(../images/icons/diagnose_history.png);
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 128px 128px;
            ">
                    <div class="d-flex align-items-center justify-content-center" style="height: 10em">
                        <h1 class="text-white">Riwayat Diagnosa</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
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
                                    <small>@forelse($diagnose->symptoms as $symptom) {{ $symptom->name }}, @endforeach </small>
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
