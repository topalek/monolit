@extends('monolit.layouts.app')

@section('content')

    <div class="container container-top">
        <div class="row">
            <div class="col-md-10 text">
                {!! $company !!}
            </div>
            <div class="col-md-10" style="text-align: center; margin-bottom: 30px">
                <a href="viber://chat?number=+380952424011">
                    <button class="btn btn-order" type="button">Выйти на связь</button>
                </a>
            </div>
        </div>
    </div>

    <style>
        .text img {
            max-width: 100%;
            display:block;
            height: auto;
            padding: 20px;
        }
    </style>

@endsection

