@extends('monolit.layouts.app')

@section('filter')
    <div class="mt-head position-relative">
        <div class="select-form-wrap container">
            <div class="row">
                <div class="col">
                    <h1 class="main-slogan" style="text-transform: uppercase">Агентство по продаже и аренде недвижимости</h1>
                    <div class="search-bg">
                        @include('monolit.partials.filter',['filterData'=> $filterData])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Recent properties start -->
    <div class="container mb-5" id="view">
        <div class="row mb-3">
            <div class="col-12">
                <a href="#" class="btn-print float-right" onclick='printDiv()'><i class="material-icons">print</i>Распечатать</a>
                <div class="results-by">Результаты поиска по запросу:</div>
                <div class="search-title">
                    {{ ( request()->input('sale') == 0) ? 'Продажа' : 'Аренда' }}
                    @if(request()->input('room_quantity')){{ request()->input('room_quantity') }} комн.@endif
                    @if(request()->input('city'))в {{ request()->input('city') }}@endif
                    @if(request()->input('price')[1])${{ request()->input('price')[0] < 10000 ? str_replace(',','', number_format(request()->input('price')[0])) : str_replace(',',' ', number_format(request()->input('price')[0])) }} — ${{ request()->input('price')[1] < 10000 ? str_replace(',','', number_format(request()->input('price')[1])) : str_replace(',',' ', number_format(request()->input('price')[1])) }}@endif
                </div>
            </div>
            <div class="col-12 col-view-toggle">
                <span class="searched-th">Найдено {{ $offers->total() }} объекта</span>
                <a id="gridView" href="#" class="searched-th @if( session()->get('view') == 'result-grid' || empty(session()->has('view')) ) active @endif" onclick="saveView('result-grid')"><i class="material-icons">view_module</i>Плиткой</a>
                <a id="listView" href="#" class="searched-th @if( session()->get('view') == 'result-list' ) active @endif" onclick="saveView('result-list')"><i class="material-icons">list</i>Списком</a>
                <div class="searched-th float-right" id="sort" style="cursor: pointer">
                    <!--
                        <span class="sort-icon asc"></span>
                        <span class="sort-icon desc"></span>
                    -->
                    <span class="sort-icon"></span>Сортировать по цене
                </div>
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
                    <div class="result-item-price">${{$offer->price < 10000 ? str_replace(',','', number_format($offer->price)) : str_replace(',',' ', number_format($offer->price)) }}</div>

                    <div class="result-item-description">
                        <div class="search-item-tth">
                        @if($offer->estate_type != 'Земельный участок')

                            @if($offer->estate_type == 'Коммерческая недвижимость')
                                Помещение,
                            @elseif($offer->estate_type == 'Дом')
                                {{ $offer->room_quantity }} - комн. дом,
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
            <!--//-->
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $offers->appends(request()->input())->render() }}
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="{{ asset('monolit/js/jquery.min.js') }}"></script>
<script src="{{ asset('monolit/js/print.js') }}"></script>
<script>
//    location.hash = '#view';
    {{--function district(data) {--}}
        {{--$.ajax({--}}
            {{--type: 'GET',--}}
            {{--url: '{{ url('/district') }}/'+data.value,--}}
            {{--success: function (data) {--}}
                {{--console.log(data.data)--}}
            {{--},--}}
            {{--error: function (data) {--}}

            {{--}--}}
        {{--});--}}
    {{--}--}}
    $(document).ready(function() {
        $('html, body').animate({
            scrollTop: $('#view').offset().top - 120
        }, 0);

        $('#sort').on('click', function () {
            $('form').submit();
        });
    });

    function printDiv() {
        var divToPrint=document.getElementById('searchResults');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    }
</script>
@endpush

