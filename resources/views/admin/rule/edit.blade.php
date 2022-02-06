@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('symptom.index') }}">Aturan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <span class="card-title">Edit Aturan dari Penyakit : <strong><a
                                    href="{{ route('disease.edit', $disease) }}">{{ $disease->name }} <i class="fa fa-pencil"></i></a></strong></span>
                    </div>
                    <div class="card-body">
                        <div class="bg-info sticky-top p-4 d-flex justify-content-center">
                            <div class="input-group w-75">
                                <input class="form-control" type="search" name="new_symptom" id="new_symptom"
                                       placeholder="Ketik Kode Gejala/Gejala"
                                       list="symptom_lists"/>
                                <button type="button" class="btn btn-primary input-group-append add-row">Tambahkan Gejala
                                </button>
                            </div>
                        </div>
                        <datalist id="symptom_lists">
                            @forelse($symptoms as $symptom)
                                <option value="{{ $symptom->code }}">{{ $symptom->name }}</option>
                            @empty

                            @endforelse
                        </datalist>

                        <form action="{{ route('rule.update',['disease_id'=>$disease->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Gejala</th>
                                    <th>Bobot</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($disease->symptoms as $symptom)
                                    <tr>
                                        <td>{{ $symptom->code }}</td>
                                        <td>{{ $symptom->name }}</td>
                                        <td>
                                            <input type="number"
                                                   class="form-control @error('value') is-invalid @enderror"
                                                   name="value[]" value="{{ $symptom->pivot->value }}"
                                                   required step="0.01"
                                                   max="1">
                                        </td>
                                        <td>
                                            <a href='#' class='delete-row btn btn-sm btn-outline-danger' data-code="{{ $symptom->code }}"><i class="fa fa-trash"></i></a>
                                            <input type="hidden" name="symptom_id[]" value="{{ $symptom->id }}">
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>
                            <hr>
                            <div class="text-right">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var symptoms = $.parseJSON('{!! $symptoms !!}')
        var symptoms_exists = $.parseJSON('{!! $disease->symptoms->keyBy('code') !!}')

        console.log(symptoms_exists)


        $(".add-row").click(function () {
            var code = $("#new_symptom").val()
            if (!code) {
                alert('Gejala tidak boleh kosong!');
                return false;
            }

            var symptom = symptoms[code];

            if(symptom == null) {
                alert('Kode Gejala tidak ditemukan. Silakan periksa kembali');
                return false
            }

            if(typeof symptoms_exists[code] != 'undefined') {
                alert('Kode Gejala sudah ada di dalam daftar!');
                return false
            }


            symptoms_exists[code] = symptom;


            var markup = "<tr>" +
                "<td class='text-success'>" + symptom.code + "</td>" +
                "<td class='text-success'>" + symptom.name + "</td>" +
                "<td><input type='number' name='value[]' class='form-control' step='0.01' value='0' max='1'></td>" +
                "<td><a href='#' class='delete-row btn btn-sm btn-outline-danger' data-code='" + symptom.code + "'>" +
                "<i class='fa fa-trash'></i></a><input type='hidden' name='symptom_id[]' value='" + symptom.id + "'></td>" +
                "</tr>";
            $("table tbody").prepend(markup);
            $("#new_symptom").val('')
        });

        $("table").on('click', '.delete-row', function () {
            var conf = confirm('Yakin hapus gejala ' + $(this).data('code') + '?')
            if (conf) {
                $(this).parent().parent().remove();
                delete symptoms_exists[$(this).data('code')];
            }

        });


        $(function () {
        });
    </script>
@endsection
