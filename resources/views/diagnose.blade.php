@extends('layouts.user')

@section('content')
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mt-4">
                    <img class="img-fluid w-25" src="{{ asset('images/icons/diagnose.png') }}" alt="chair.png">
                </div>
                <h3 class="text-primary mt-4">Diagnosa Penyakit Gigi</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolorum iste nisi quia quo quod voluptate? Aperiam nisi nobis, omnis quis sequi ullam vitae? Earum ex fuga officiis quam similique!</p>
            </div>
            <div class="col-md-8">
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
