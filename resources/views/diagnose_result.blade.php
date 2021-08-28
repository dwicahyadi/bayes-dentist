@extends('layouts.user')

@section('content')
    <div class="bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="background-image: url(../images/icons/diagnose_result.png);
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 128px 128px;
            ">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h5 class="mt-4 text-white">Berdasarkan gejala dan prediksi kamu mengalami :</h5>
                        <h1 class="h1 text-white">{{ $diagnose->disease->name }}</h1>
                        <small class="text-muted">Nilai Bayes : 123</small>
                        <div class="mt-4">
                            <a href="{{ route('diagnose.create') }}" class="btn btn-outline-light rounded-pill">Diagnosa Baru</a>
                            <a href="{{ route('diagnose.create') }}" class="btn btn-outline-light rounded-pill">Riwayat Diagnosa</a>
                        </div>
                    </div>

                    <ul class="nav nav-tabs nav-fill mt-4" id="myTab" role="tablist">
                        <li class="nav-item" >
                            <a class="nav-link active  text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fa fa-stethoscope"></i> <span class="d-none d-lg-inline-block">Diagnosa</span>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="fa fa-info-circle"></i> <span class="d-none d-lg-inline-block">Informasi Penyakit</span>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link text-dark" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">
                                <i class="fa fa-plus"></i> <span class="d-none d-lg-inline-block">Saran</span>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link text-dark" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">
                                <i class="fa fa-calculator"></i> <span class="d-none d-lg-inline-block">NaiveBayes</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="tab-content">

                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h5 class="mt-4">Hasil Diagnosa</h5>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{ $diagnose->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Telp</td>
                                    <td>: {{ $diagnose->user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: {{ $diagnose->user->mail }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $diagnose->user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Diagnosa</td>
                                    <td>: {{ $diagnose->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="align-top">Gejala</td>
                                    <td>: @foreach($diagnose->symptoms as $symptom) {{ $symptom->name }}<br>&nbsp; @endforeach </td>
                                </tr>
                                <tr>
                                    <td>Diagnosa</td>
                                    <td>: <strong class="text-primary"><u>{{ $diagnose->disease->name }}</u></strong></td>
                                </tr>
                            </table>
                        </div>

                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h5 class="mt-4">Informasi</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi earum et excepturi impedit labore quae quas quisquam ratione ut. Adipisci aut consequatur dolorum fuga iste itaque placeat saepe temporibus!</p>
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                            <h5 class="mt-4">Saran</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi earum et excepturi impedit labore quae quas quisquam ratione ut. Adipisci aut consequatur dolorum fuga iste itaque placeat saepe temporibus!</p>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <h5 class="mt-4">Naive Bayes</h5>
                            <h5>Evidance/gejala yang diderita</h5>
                            <ol>
                                @foreach($diagnose->symptoms as $symptom)
                                    <li>[{{ $symptom->code }}] {{ $symptom->name }}</li>
                                @endforeach
                            </ol>
                            <hr>

                            <h5>Hipotesa penyakit berdsarkan evidence/gejala</h5>
                            <ol>
                                @foreach($data['P_CX'] as $result)
                                    <li>{{ $result['C'] }}</li>
                                @endforeach
                            </ol>
                            <hr>

                            <h5>Menentukan nilai probabilitas dari tiap evidence/gejala berdasarkan hipotesis</h5>
                            @foreach($data['P_CX'] as $result)
                                <strong>{{ $result['C'] }}</strong><br>
                                <p class="mb-0"><i>P(c)</i> = {{ $result['P_c'] }}
                                    <i class="fa fa-question-circle text-primary" title="Probabilitas kemunculan {{$result['C']}}"></i></p>
                                @foreach($result['x'] as $x => $val)
                                    <i>P({{$x}} | c)</i>   = {{$val}} <i class="fa fa-question-circle text-primary" title="Probabilitas kemunculan gejala {{$x}} pada {{$result['C']}}"></i><br>
                                @endforeach

                                <div class="m-2 p-4 bg-light rounded text-center border"><i>P(x|c)</i> = @foreach($result['x'] as $x => $val)
                                    {{$val}} &times;
                                    @endforeach
                                    = {{ $result['P_xc'] }}</div><br>

                            @endforeach
                            <hr>

                            <h5>Jumlahkan seluruh nilai dari setiap evidance/gejala</h5>
                            <div class="m-2 p-4 bg-light rounded text-center border">
                                <i>P(x)</i> = @foreach($data['P_CX'] as $result) {{ $result['P_xc'] }} + @endforeach = {{ number_format($data['P_x'],3) }}
                            </div>
                            <hr>

                            <h5>Hitung menggunakan rumus Naive Bayes</h5>

                            @foreach($data['P_CX'] as $result)
                                <div class="m-2 p-4 bg-light rounded text-center border">
                                    <i>P({{ $result['C'] }} | X)</i>
                                    = <i>P(x|c) . P(c) / P(x)</i>
                                    <br>= {{ $result['P_xc'] }} x {{ $result['P_c'] }} / {{ $data['P_x'] }}
                                    <br>= {{ number_format($result['bayes_value'], 5) }}
                                    <br>= <strong>{{ number_format($result['bayes_value']*100, 3) }}%</strong>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
