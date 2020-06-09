@extends('monolit.layouts.app')

@section('content')
    <div class="container mb-5" id="view" style="margin-top: 120px">
        <div class="row mb-3">
            <div class="col-12">
                <div class="results-by">Лучшее предложения:</div>
            </div>
            <div class="col-12 col-view-toggle">
                <a id="gridView" href="#" class="searched-th @if( session()->get('view') == 'result-grid' || empty(session()->has('view')) ) active @endif" onclick="saveView('result-grid')"><i class="material-icons">view_module</i>Плиткой</a>
                <a id="listView" href="#" class="searched-th @if( session()->get('view') == 'result-list' ) active @endif" onclick="saveView('result-list')"><i class="material-icons">list</i>Списком</a>
            </div>
        </div>
        <div id="searchResults" class="@if(session()->has('view')) {{ session()->get('view') }} @else result-grid @endif">
            @foreach($offers as $offer)
                <a href="{{ route('view.object', ['link' => $offer->object_code]) }}" class="result-item">
                    @if(!is_null($offer->photo))
                        <div class="result-item-img" style="background-image:url('{{ $offer->photo }}')"></div>
                    @else
                        <div class="result-item-img" style="background-image:url('{{ asset('images/'.str_slug($offer->estate_type).'.jpg') }}')"></div>
                    @endif
                    <div class="result-item-price">${{$offer->price < 10000 ? str_replace(',','', number_format($offer->price)) : str_replace(',',' ', number_format($offer->price)) }} </div>

                    <div class="result-item-description">
                        @if($offer->estate_type != 'Земельный участок')
                        <div class="search-item-tth">
                            @if($offer->estate_type == 'Дом')
                                {{ $offer->room_quantity }} комн. дом,
                            @else
                                {{ $offer->room_quantity }} - комн. кв.,
                            @endif

                            {{ $offer->total_floor_space }} м², этаж: {{ $offer->floor }}/{{ $offer->number_of_storeys }}
                            @else
                               Земельный участок {{ $offer->total_floor_space }} м²
                            @endif
                        </div>
                        <div class="search-item-address">г. {{ $offer->city }} <br>{{ $offer->street }} @if($offer->estate_type != 'Дом') {{ $offer->house_no }} @endif</div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $offers->appends(request()->input())->render() }}
            </div>
        </div>
    </div>
@endsection