@extends('layouts.user')

@section('content')
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <img class="img-fluid w-50" src="{{ asset('images/icons/chair.png') }}" alt="chair.png">
                <h2 class="text-primary mt-4">Selamat datang</h2>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-center flex-wrap">
                    <a href="{{ route('diagnose') }}" class="my-2 mx-2 btn btn-outline-primary" style="width: 8rem">
                        <img src="{{ asset('images/icons/diagnose.png') }}" alt="diagnose.png" style="width: 36px"><br>
                        Diagnosa
                    </a>

                    <a href="" class="my-2 mx-2 btn btn-outline-primary" style="width: 8rem">
                        <img src="{{ asset('images/icons/diagnose_history.png') }}" alt="diagnose.png" style="width: 36px"><br>
                        Riwayat
                    </a>

                    <a href="" class="my-2 mx-2 btn btn-outline-primary" style="width: 8rem">
                        <img src="{{ asset('images/icons/disease.png') }}" alt="diagnose.png" style="width: 36px"><br>
                        Penyakit Gigi
                    </a>

                    <a href="" class="my-2 mx-2 btn btn-outline-primary" style="width: 8rem">
                        <img src="{{ asset('images/icons/user.png') }}" alt="diagnose.png" style="width: 36px"><br>
                        Profile
                    </a>
                </div>

            </div>
            <div class="col-md-8 mt-4">
                <strong class="my-4 text-primary">Diagnosa Terakhir</strong>
                <div class="card shadow-sm mt-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-4">
                            <img src="{{ asset('images/icons/gum.png') }}" alt="gum.png" style="width: 36px"><br>
                        </div>
                        <div>
                            <span>2021-02-02</span><br>
                            <strong>Sakit Gigi</strong><br>
                            <small>Sakit a, sakit b, sakit c</small>
                        </div>

                    </div>
                </div>
                <div class="card shadow-sm mt-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-4">
                            <img src="{{ asset('images/icons/gum.png') }}" alt="gum.png" style="width: 36px"><br>
                        </div>
                        <div>
                            <span>2021-02-02</span><br>
                            <strong>Sakit Gigi</strong><br>
                            <small>Sakit a, sakit b, sakit c</small>
                        </div>

                    </div>
                </div>
                <div class="card shadow-sm mt-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-4">
                            <img src="{{ asset('images/icons/gum.png') }}" alt="gum.png" style="width: 36px"><br>
                        </div>
                        <div>
                            <span>2021-02-02</span><br>
                            <strong>Sakit Gigi</strong><br>
                            <small>Sakit a, sakit b, sakit c</small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
