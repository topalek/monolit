@extends('monolit.layouts.app')

@section('content')
    <div class="container container-top">
        <div class="row justify-content-center">
            <div class="col-lg-12 text">
                {!! $presentation !!}
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

