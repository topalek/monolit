@extends('monolit.layouts.app')

@section('content')

    <div class="container container-top">
        <div class="other-offers-title">Все виды недвижимости, которыми мы занимаемся</div>
        <div class="row">
            <div class="col d-flex flex-wrap cards-wrap">
                @foreach ($realtys as $realty)
                    <div class="card card-l-50">
                        <div class="card-body">
                            <a href="{{ $realty->main_url }}" style="color: #fff">
                                <h2 class="card-title">{{ $realty->main_title }}</h2>
                            </a>

                            <p style="color: #d5d5d5">{{ $realty->description }}</p>
                            <div class="card-small-text row" style="margin-top: 20px">
                                @foreach ($realty->items as $item)
                                    <div class="col-md-6">
                                        <a href="{{ url($item->url) }}" style="color: #fff; font-weight: 400; font-size: 18px" class="text-white">{{ $item->title }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-bg">
                            <img src="{{ asset('uploads/'.$realty->img) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align: center; margin: 30px 0px">
                <a href="viber://chat?number=+380952424011">
                    <button class="btn btn-order" type="button">Подобрать варианты</button>
                </a>
            </div>
        </div>

    </div>
    <div class="bg-light-2" style="border-top: none;">

        <div class="container justify-content-center">
            <div class="col-lg-12">
                <div class="h1 text-center">{{ $text->title }}</div>
                <p class="text-secondary">{!! $text->description !!}</p>
            </div>
        </div>
    </div>

    <style>
        [class*="card-l"] .card-body {
            align-items: unset!important;
        }

        [class*="card-l"] {
            height: 300px;

        }

        .card-title {
            align-items: safe!important;
        }

        .card a:hover {
            color: #f00!important;
            text-decoration: none;
        }
        .card-bg>img {
            max-height: 100%;
        }
    </style>
@endsection
