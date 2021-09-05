@extends('layouts.user')

@section('content')
    <div class="bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="background-image: url(../images/icons/diagnose.png);
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 128px 128px;
            ">
                    <div class="d-flex align-items-center justify-content-center" style="height: 10em">
                        <h1 class="text-white">Diagnosa</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <strong class="mt-4 text-primary">Tandai gejala yang kamu alami</strong>
                <form action="{{ route('diagnose.store') }}" method="post">
                    @csrf
                    <ul class="list-group mt-4">
                        @forelse($symptoms as $symptom)
                            <li class="list-group-item list-group-item-action">
                                <label>
                                    <input type="checkbox" name="symptom_id[]" value="{{ $symptom->id }}">
                                    [{{ $symptom->code }}] {{ $symptom->name }}
                                </label>
                            </li>
                        @empty

                        @endforelse
                    </ul>
                    <button class="btn btn-lg btn-primary my-4 btn-block">DIAGNOSA</button>
                    <br>
                    <br>
                    <br>
                </form>

            </div>
        </div>
    </div>

    <script>
        $('li').click(function (){
            var chkbx = $(this).find('input[type=checkbox]');
            chkbx.prop("checked", !chkbx.prop("checked"));
        })
    </script>
@endsection
