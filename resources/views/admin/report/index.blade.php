@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('report') }}">laporan</a></li>
                    <li class="breadcrumb-item active">laporan {{ request('start_date')." s/d ".request('end_date') }}</li>
                </ol>

                <div class="card shadow-sm mb-2">
                    <div class="card-header">
                        <strong class="card-title">Grafik</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Grafik Penyakit Gigi</strong>
                                <canvas id="diseases_pie"></canvas>
                            </div>

                            <div class="col-md-6">
                                <strong>Grafik Gejala</strong>
                                <canvas id="symptoms_pie"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between">
                        <strong class="card-title">Daftar Diagnosa</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Waktu</th>
                                <th>Nama</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Gejala</th>
                                <th>Hasil Diagnosa</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($diagnoses as $diagnose)
                                <tr>
                                    <td>{{ $diagnose->id }}</td>
                                    <td>{{ $diagnose->created_at }}</td>
                                    <td>{{ $diagnose->user->name }}</td>
                                    <td>{{ $diagnose->user->phone }}</td>
                                    <td>{{ $diagnose->user->email }}</td>
                                    <td>{{ $diagnose->user->address }}</td>
                                    <td>
                                        @forelse($diagnose->symptoms as $symptom)
                                            [{{ $symptom->code }}] {{ $symptom->name }},
                                        @empty
                                            <span>Kosong</span>
                                        @endforelse
                                    </td>
                                    <td>{{ $diagnose->disease->name ?? 'Kosong'}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center"> <a class="btn btn-primary" href="{{ route('disease.create') }}">Pilih tanggal lain</a> </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var c1 = document.getElementById('diseases_pie');
        var c2 = document.getElementById('symptoms_pie');

        var diseases_pie = new Chart(c1, {
            type: 'pie',
            data: {
                labels: {!! $diseases_chart['label'] !!},
                datasets: [{
                    label: 'Penyakit Gigi',
                    data: {!! $diseases_chart['value'] !!},
                    backgroundColor: {!! $diseases_chart['colors'] !!},
                    hoverOffset: 10
                }]
            },

        });
        var symptoms_pie = new Chart(c2, {
            type: 'pie',
            data: {
                labels: {!! $symptoms_chart['label'] !!},
                datasets: [{
                    label: 'Penyakit Gigi',
                    data: {!! $symptoms_chart['value'] !!},
                    backgroundColor: {!! $symptoms_chart['colors'] !!},
                    hoverOffset: 10
                }]
            },
            // options: { plugins: { legend: { display: false }, } }
        });

    </script>
@endsection
