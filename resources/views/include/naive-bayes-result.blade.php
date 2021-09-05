<h5 class="mt-4">Naive Bayes</h5>
<h5 class="text-primary">Evidance/gejala yang diderita</h5>
<ol>
    @foreach($diagnose->symptoms as $symptom)
        <li>[{{ $symptom->code }}] {{ $symptom->name }}</li>
    @endforeach
</ol>
<hr>

<h5 class="text-primary">Hipotesa penyakit berdsarkan evidence/gejala</h5>
<ol>
    @foreach($data['P_CX'] as $result)
        <li>{{ $result['C'] }}</li>
    @endforeach
</ol>
<hr>

<h5 class="text-primary">Menentukan nilai probabilitas dari tiap evidence/gejala berdasarkan hipotesis</h5>
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

<h5 class="text-primary">Jumlahkan seluruh nilai dari setiap evidance/gejala</h5>
<div class="m-2 p-4 bg-light rounded text-center border">
    <i>P(x)</i> = @foreach($data['P_CX'] as $result) {{ $result['P_xc'] }} + @endforeach = {{ number_format($data['P_x'],3) }}
</div>
<hr>

<h5 class="text-primary">Hitung menggunakan rumus Naive Bayes</h5>

@foreach($data['P_CX'] as $result)
    <div class="m-2 p-4 bg-light rounded text-center border">
        <i>P({{ $result['C'] }} | X)</i>
        = <i>P(x|c) . P(c) / P(x)</i>
        <br>= {{ $result['P_xc'] }} x {{ $result['P_c'] }} / {{ $data['P_x'] }}
        <br>= {{ number_format($result['bayes_value'], 5) }}
        <br>= <strong>{{ number_format($result['bayes_value']*100, 3) }}%</strong>
    </div>

@endforeach
<hr>

<h5 class="text-primary">Kesimpulan</h5>
@if(count($data['P_CX']) == 1)
    <p>Hanya ditemukan satu hipotesa penyakit berdasarkan gejala/evidence yang dialami.</p>
@else
    <p>Ditemukan {{ count($data['P_CX']) }} hipotesa penyakit berdasarkan gejala/evidence yang dialami,
        maka hasil diagnosa adalah hipotesa dengan nilai Bayes tertinggi.</p>
@endif
<p>Hasil diagnosanya adalah <strong>{{ $data['P_CX'][$data['result']]['C'] }}</strong> dengan nilai Bayes {{ $data['bayes_final_value'] }}</p>
