@extends('layouts.user')

@section('content')
    <div class="bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="background-image: url(../images/icons/disease.png);
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 128px 128px;
            ">
                    <div class="d-flex align-items-center justify-content-center" style="height: 10em">
                        <h1 class="text-white">Daftar Penyakit</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div id="accordion">


                @forelse($diseases as $disease)
                        <div class="card">
                            <div class="card-header"
                                 data-toggle="collapse"
                                 data-target="#disease-{{ $disease->id }}"
                                 aria-expanded="true"
                                 aria-controls="disease-{{ $disease->id }}"
                                 id="heading-{{$disease->id}}"
                                 style="cursor: pointer"
                            >
                                <h5 class="mb-0">
                                    {{ $disease->name }}
                                </h5>
                            </div>

                            <div id="disease-{{ $disease->id }}" class="collapse" aria-labelledby="heading-{{$disease->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    {{ $disease->description ?? 'informasi belum di input' }}
                                    <br>
                                    <strong>Gejala yang munkin dialami</strong><br>
                                    <ul>
                                        @foreach($disease->symptoms as $symptom)
                                            <li>{{ $symptom->name }}</li>
                                        @endforeach
                                    </ul>

                                    <br>
                                    <strong>Saran/Pengobatan</strong><br>
                                    {{ $disease->advice ?? 'informasi belum di input' }}
                                </div>
                            </div>
                        </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
@endsection
