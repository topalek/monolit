@extends('monolit.layouts.app')

@section('filter')
    <div class="mt-head position-relative">
        <div class="select-form-wrap container">
            <div class="row">
                <div class="col">
                    <h1 class="main-slogan" style="text-transform: uppercase">Агентство по продаже и аренде недвижимости</h1>
                    <div class="search-bg">
                        @include('monolit.partials.filter',['cities'=> $cities])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner end -->
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col d-flex flex-wrap cards-wrap" @if($block->show_1 == 0) style="display: none" @endif>
                <div class="card card-l-50">
                    <div class="card-body text-center">
                        <h2 class="card-title">{{ $block->title_1 }}</h2>
                        <div class="card-small-text text-center">
                            @if(!is_null($block->name_1_1))
                                <a href="{{ url($block->link_1_1) }}" class="text-white">{{ $block->name_1_1 }}</a>
                            @endif
                            @if(!is_null($block->name_1_2))
                                <a href="{{ url($block->link_1_2) }}" class="text-white">{{ $block->name_1_2 }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-bg">
                        <img src="{{ asset('uploads/'.$block->image_1) }}" alt="">
                    </div>
                </div>
                <div class="card card-l-50"  @if($block->show_2 == 0) style="display: none" @endif>
                    <div class="card-body text-center">
                        <h2 class="card-title">{{ $block->title_2 }}</h2>
                        <div class="card-small-text text-center">
                            @if(!is_null($block->name_2_1))
                                <a href="{{ url($block->link_2_1) }}" class="text-white">{{ $block->name_2_1 }}</a>
                            @endif
                            @if(!is_null($block->name_2_2))
                                <a href="{{ url($block->link_2_2) }}" class="text-white">{{ $block->name_2_2 }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-bg">
                        <img src="{{ asset('uploads/'.$block->image_2) }}" alt="">
                    </div>
                </div>
                <div class="card card-l-100"  @if($block->show_3 == 0) style="display: none" @endif>
                    <div class="card-body text-center">
                        <a href="{{ url($block->link_3) }}" class="text-white"><h2 class="card-title">
                                {{ $block->title_3 }}
                        </h2></a>
                    </div>
                    <div class="card-bg">
                        <img src="{{ asset('uploads/'.$block->image_3) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center mb-3">
            <div class="col">
                <div class="best-offers-title">Лучшие предложения</div>
                <ul class="nav nav-pills d-flex justify-content-center mb-4" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a id="apartments-tab" class="nav-link best-offer-pill active" data-toggle="pill" href="#apartments" role="tab"
                           aria-selected="true">Квартиры</a>
                    </li>
                    <li class="nav-item">
                        <a id="houses-tab" class="nav-link best-offer-pill" data-toggle="pill" href="#houses" role="tab"
                           aria-selected="false">Дома</a>
                    </li>
                </ul>
                <div class="tab-content" id="BestOffers">
                    <div class="tab-pane fade show active" id="apartments" role="tabpanel" aria-labelledby="apartments-tab">
                        <div class="row justify-content-center">
                            @each('monolit.partials.room', $article, '_article')
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <a href="{{ route('all.offers', ['category' => 'apartments']) }}" class="btn btn-outline-secondary btn-offers">Все предложения</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="houses" role="tabpanel" aria-labelledby="houses-tab">
                        <div class="row">
                            @each('monolit.partials.room', $houses, '_article')
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <a href="{{ route('all.offers', ['category' => 'houses']) }}" class="btn btn-outline-secondary btn-offers">Все предложения</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($recentlyViewed)
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="best-offers-title text-center">Недавно просмотренные</div>
                    <br>
                </div>
            </div>
            <div class="row">
                @each('monolit.partials.room', $recentlyViewed, '_article')
            </div>
            <br>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a href="{{ route('recently') }}" class="btn btn-outline-secondary btn-offers">Все недавно просмотренные</a>
                </div>
            </div>
            <br><br>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="h1 text-center">{{ $advantage->title }}</div>
                <p class="text-secondary">
                    {!! $advantage->description !!}
                </p>
            </div>
            <div class="col-md-10" style="text-align: center; margin-bottom: 60px">
                <a href="viber://chat?number=+380952424011">
                    <button class="btn btn-order" type="button">Написать нам в чат</button>
                </a>
            </div>
        </div>
    </div>
@endsection
