<ul class="navbar-nav mr-auto">
    <li class="nav-item mx-2 @if(request()->is('*home')) bg-info rounded shadow @endif">
        <a class="nav-link text-center " href="{{ route('home') }}">
            <img src="{{ asset('images/icons/chair.png') }}" style="width: 36px" alt=""><br>
            Beranda</a>
    </li>
    <li class="nav-item mx-2 @if(request()->is('admin/symptom*')) bg-info rounded shadow @endif">
        <a class="nav-link text-center" href="{{ route('symptom.index') }}">
            <img src="{{ asset('images/icons/symptom.png') }}" style="width: 36px" alt=""><br>
            Gejala</a>
    </li>
    <li class="nav-item mx-2 @if(request()->is('admin/disease*')) bg-info rounded shadow @endif">
        <a class="nav-link text-center" href="{{ route('disease.index') }}">
            <img src="{{ asset('images/icons/disease.png') }}" style="width: 36px" alt=""><br>
            Penyakit</a>
    </li>
    <li class="nav-item mx-2 @if(request()->is('admin/rule*')) bg-info rounded shadow @endif">
        <a class="nav-link text-center" href="{{ route('rule.index') }}">
            <img src="{{ asset('images/icons/rules.png') }}" style="width: 36px" alt=""><br>
            Aturan</a>
    </li>
    <li class="nav-item mx-2 @if(request()->is('admin/diagnose*')) bg-info rounded shadow @endif">
        <a class="nav-link text-center" href="{{ route('diagnose.index') }}">
            <img src="{{ asset('images/icons/diagnose_result.png') }}" style="width: 36px" alt=""><br>
            Hasil Diagnosa</a>
    </li>
    <li class="nav-item mx-2 @if(request()->is('admin/user*')) bg-info rounded shadow @endif">
        <a class="nav-link text-center" href="{{ route('user.index') }}">
            <img src="{{ asset('images/icons/user.png') }}" style="width: 36px" alt=""><br>
            Pengguna</a>
    </li>
    <li class="nav-item mx-2 @if(request()->is('admin/report*')) bg-info rounded shadow @endif">
        <a class="nav-link text-center" href="{{ route('report') }}">
            <img src="{{ asset('images/icons/reports.png') }}" style="width: 36px" alt=""><br>
            Laporan</a>
    </li>
</ul>
