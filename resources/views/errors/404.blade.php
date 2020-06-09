@extends('monolit.layouts.app')

@section('content')

    <div class="container  text-center" style="margin-top: 120px;">
        <div class="row justify-content-center">
            <h1 class="h1 text-center">ТАКОЙ СТРАНИЦЫ НЕ СУЩЕСТВУЕТ</h1>
            <div class="col-md-10" style="text-align: center; margin: 35px 0px">
                <a href="{{ url('/') }}">
                    <button class="btn btn-order" type="button">Вернуться на главную</button>
                </a>
            </div>

            <div class="col-md-10 justify-content-center">
                <img src="{{ asset('images/404.jpg') }}" alt="404" class="img-responsive" style="margin: 0 auto" />
            </div>

        </div>
    </div>

    <style>
        .img-responsive {
            display: block;
            max-width: 100%;
            height: auto;
        }
    </style>

@endsection