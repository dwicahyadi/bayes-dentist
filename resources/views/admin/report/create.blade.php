@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
                <div class="card shadow-sm mb-2">
                    <div class="card-body">
                        <form action="{{ route('report') }}" method="get">
                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input type="date" name="start_date" class="form-control" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input type="date" name="end_date" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-4 d-flex justify-content-end">
                                    <input type="submit" class="btn btn-primary mx-2" value="Tampilkan">
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

