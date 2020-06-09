@extends('monolit.layouts.app')

@section('filter')
    <div class="mt-head position-relative">
        <div class="select-form-wrap container">
            <div class="row">
                <div class="col">
                    <h1 class="main-slogan" style="text-transform: uppercase">Агентство по продаже и аренде недвижимости</h1>
                    <div class="search-bg">
                        <form action="{{ route('filter') }}" id="Search" class="extended-search">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center flex-wrap">
                                    <div class="form-input-wrap city">
                                        <select class="search-field" name="city">
                                            <option value="">Выберите город</option>
                                            <option value="Славянск" {{ (\Illuminate\Support\Facades\Input::get('city') == 'Славянск') ? 'selected' : '' }}>Славянск</option>
                                            {{--<option value="Святогорск" {{ (\Illuminate\Support\Facades\Input::get('city') == 'Святогорск') ? 'selected' : '' }}>Святогорск</option>--}}
                                            {{--<option value="Ильечёвка" {{ (\Illuminate\Support\Facades\Input::get('city') == 'Ильечёвка') ? 'selected' : '' }}>Ильечёвка</option>--}}
                                            <option value="Краматорск" {{ (\Illuminate\Support\Facades\Input::get('city') == 'Краматорск') ? 'selected' : '' }}>Краматорск</option>
                                        </select>
                                    </div>
                                    <div class="form-input-wrap category">
                                        <select class="search-field" name="sale" id="category">
                                            <option value="">Категория</option>
                                            <option value="0" {{  request()->input('sale') == 0 ? 'selected' : '' }}>Продажа</option>
                                            <option value="1" {{  request()->input('sale') == 1 ? 'selected' : '' }}>Аренда</option>
                                        </select>
                                    </div>
                                    <div class="form-input-wrap type">
                                        <select class="search-field" name="estate_type" id="type">
                                            <option value="">Выберите тип</option>
                                            <option value="Квартира" {{ (\Illuminate\Support\Facades\Input::get('estate_type') == 'Квартира') ? 'selected' : '' }}>Квартира</option>
                                            <option value="Дом" {{ (\Illuminate\Support\Facades\Input::get('estate_type') == 'Дом') ? 'selected' : '' }}>Дом</option>
                                            <option value="Коммерческая недвижимость" {{ (\Illuminate\Support\Facades\Input::get('estate_type') == 'Коммерческая недвижимость') ? 'selected' : '' }}>Коммерческая недвижимость</option>
                                            <option value="Земельный участок" {{ (\Illuminate\Support\Facades\Input::get('estate_type') == 'Земельный участок') ? 'selected' : '' }}>Земельный участок</option>
                                        </select>
                                    </div>
                                    <div class="form-input-wrap rooms">
                                        <select class="search-field room_quantity" name="room_quantity">
                                            <option value="">Количество комнат</option>
                                            <option value="1" {{ request()->input('room_quantity') == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ request()->input('room_quantity') == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ request()->input('room_quantity') == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4+" {{ request()->input('room_quantity') == '4+' ? 'selected' : '' }}>4+</option>
                                        </select>
                                    </div>
                                    <div class="form-input-wrap price">
                                        <select class="search-field arenda" disabled style="display: none" name="price[]">
                                            <option value="">Цена $ от</option>
                                            <option value="50" {{ request()->input('price')[0] == 50 ? 'selected' : '' }}>50</option>
                                            <option value="100" {{ request()->input('price')[0] == 100 ? 'selected' : '' }}>100</option>
                                            <option value="200" {{ request()->input('price')[0] == 200 ? 'selected' : '' }}>200</option>
                                            <option value="300" {{ request()->input('price')[0] == 300 ? 'selected' : '' }}>300</option>
                                            <option value="400" {{ request()->input('price')[0] == 400 ? 'selected' : '' }}>400</option>
                                            <option value="500" {{ request()->input('price')[0] == 500 ? 'selected' : '' }}>500</option>
                                        </select>

                                        <select class="search-field other" name="price[]">
                                            <option value="">Цена $ от</option>
                                            <option value="1000" {{ request()->input('price')[0] == 1000 ? 'selected' : '' }}>1000</option>
                                            <option value="2000" {{ request()->input('price')[0] == 2000 ? 'selected' : '' }}>2000</option>
                                            <option value="3000" {{ request()->input('price')[0] == 3000 ? 'selected' : '' }}>3000</option>
                                            <option value="4000" {{ request()->input('price')[0] == 4000 ? 'selected' : '' }}>4000</option>
                                            <option value="5000" {{ request()->input('price')[0] == 5000 ? 'selected' : '' }}>5000</option>
                                            <option value="6000" {{ request()->input('price')[0] == 6000 ? 'selected' : '' }}>6000</option>
                                            <option value="7000" {{ request()->input('price')[0] == 7000 ? 'selected' : '' }}>7000</option>
                                            <option value="8000" {{ request()->input('price')[0] == 8000 ? 'selected' : '' }}>8000</option>
                                            <option value="9000" {{ request()->input('price')[0] == 9000 ? 'selected' : '' }}>9000</option>
                                            <option value="10000" {{ request()->input('price')[0] == 10000 ? 'selected' : '' }}>10000</option>
                                            <option value="15000" {{ request()->input('price')[0] == 15000 ? 'selected' : '' }}>15000</option>
                                            <option value="20000" {{ request()->input('price')[0] == 20000 ? 'selected' : '' }}>20000</option>
                                            <option value="30000" {{ request()->input('price')[0] == 30000 ? 'selected' : '' }}>30000</option>
                                            <option value="40000" {{ request()->input('price')[0] == 40000 ? 'selected' : '' }}>40000</option>
                                            <option value="50000" {{ request()->input('price')[0] == 50000 ? 'selected' : '' }}>50000</option>
                                            <option value="60000" {{ request()->input('price')[0] == 60000 ? 'selected' : '' }}>60000</option>
                                            <option value="70000" {{ request()->input('price')[0] == 70000 ? 'selected' : '' }}>70000</option>
                                            <option value="80000" {{ request()->input('price')[0] == 80000 ? 'selected' : '' }}>80000</option>
                                            <option value="90000" {{ request()->input('price')[0] == 90000 ? 'selected' : '' }}>90000</option>
                                            <option value="100000" {{ request()->input('price')[0] == 100000 ? 'selected' : '' }}>100000</option>
                                        </select>

                                        <select class="search-field arenda" disabled style="display: none" name="price[]">
                                            <option value="">До</option>
                                            <option value="50" {{ request()->input('price')[1] == 50 ? 'selected' : '' }}>50</option>
                                            <option value="100" {{ request()->input('price')[1] == 100 ? 'selected' : '' }}>100</option>
                                            <option value="200" {{ request()->input('price')[1] == 200 ? 'selected' : '' }}>200</option>
                                            <option value="300" {{ request()->input('price')[1] == 300 ? 'selected' : '' }}>300</option>
                                            <option value="400" {{ request()->input('price')[1] == 400 ? 'selected' : '' }}>400</option>
                                            <option value="500" {{ request()->input('price')[1] == 500 ? 'selected' : '' }}>500</option>
                                        </select>

                                        <select class="search-field other" name="price[]">
                                            <option value="">До</option>
                                            <option value="1000" {{ request()->input('price')[1] == 1000 ? 'selected' : '' }}>1000</option>
                                            <option value="2000" {{ request()->input('price')[1] == 2000 ? 'selected' : '' }}>2000</option>
                                            <option value="3000" {{ request()->input('price')[1] == 3000 ? 'selected' : '' }}>3000</option>
                                            <option value="4000" {{ request()->input('price')[1] == 4000 ? 'selected' : '' }}>4000</option>
                                            <option value="5000" {{ request()->input('price')[1] == 5000 ? 'selected' : '' }}>5000</option>
                                            <option value="6000" {{ request()->input('price')[1] == 6000 ? 'selected' : '' }}>6000</option>
                                            <option value="7000" {{ request()->input('price')[1] == 7000 ? 'selected' : '' }}>7000</option>
                                            <option value="8000" {{ request()->input('price')[1] == 8000 ? 'selected' : '' }}>8000</option>
                                            <option value="9000" {{ request()->input('price')[1] == 9000 ? 'selected' : '' }}>9000</option>
                                            <option value="10000" {{ request()->input('price')[1] == 10000 ? 'selected' : '' }}>10000</option>
                                            <option value="15000" {{ request()->input('price')[1] == 15000 ? 'selected' : '' }}>15000</option>
                                            <option value="20000" {{ request()->input('price')[1] == 20000 ? 'selected' : '' }}>20000</option>
                                            <option value="30000" {{ request()->input('price')[1] == 30000 ? 'selected' : '' }}>30000</option>
                                            <option value="40000" {{ request()->input('price')[1] == 40000 ? 'selected' : '' }}>40000</option>
                                            <option value="50000" {{ request()->input('price')[1] == 50000 ? 'selected' : '' }}>50000</option>
                                            <option value="60000" {{ request()->input('price')[1] == 60000 ? 'selected' : '' }}>60000</option>
                                            <option value="70000" {{ request()->input('price')[1] == 70000 ? 'selected' : '' }}>70000</option>
                                            <option value="80000" {{ request()->input('price')[1] == 80000 ? 'selected' : '' }}>80000</option>
                                            <option value="90000" {{ request()->input('price')[1] == 90000 ? 'selected' : '' }}>90000</option>
                                            <option value="100000" {{ request()->input('price')[1] == 100000 ? 'selected' : '' }}>100000</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div id="advancedFields" class="row">
                                <div class="col-12 d-flex justify-content-center flex-wrap mb-4">
                                    <div class="form-input-wrap space">
                                        <select class="search-field" name="total_floor_space">
                                            <option value="">Общая</option>
                                            <option value="30" {{ request()->input('total_floor_space') == 30  ? 'selected' : '' }}>от 30 м²</option>
                                            <option value="40" {{ request()->input('total_floor_space') == 40 ? 'selected' : '' }}>от 40 м²</option>
                                            <option value="50" {{ request()->input('total_floor_space') == 50 ? 'selected' : '' }}>от 50 м²</option>
                                            <option value="70" {{ request()->input('total_floor_space') == 70 ? 'selected' : '' }}>от 70 м²</option>
                                            <option value="100" {{ request()->input('total_floor_space') == 100 ? 'selected' : '' }}>от 100 м²</option>
                                            <option value="200" {{ request()->input('total_floor_space') == 200 ? 'selected' : '' }}>от 200 м²</option>
                                        </select>
                                        <select class="search-field b-left floor_space" name="floor_space">
                                            <option value="">Жилая</option>
                                            <option value="20" {{ request()->input('floor_space') == 20 ? 'selected' : '' }}>от 20 м²</option>
                                            <option value="30" {{ request()->input('floor_space') == 30 ? 'selected' : '' }}>от 30 м²</option>
                                            <option value="40" {{ request()->input('floor_space') == 40 ? 'selected' : '' }}>от 40 м²</option>
                                            <option value="50" {{ request()->input('floor_space') == 50 ? 'selected' : '' }}>от 50 м²</option>
                                        </select>
                                        <select class="search-field b-left kitchen_floor_space" name="kitchen_floor_space">
                                            <option value="">Кухня</option>
                                            <option value="5" {{ request()->input('kitchen_floor_space') == 5 ? 'selected' : '' }}>от 5 м²</option>
                                            <option value="10" {{ request()->input('kitchen_floor_space') == 10 ? 'selected' : '' }}>от 10 м²</option>
                                            <option value="15" {{ request()->input('kitchen_floor_space') == 15 ? 'selected' : '' }}>от 15 м²</option>
                                            <option value="20" {{ request()->input('kitchen_floor_space') == 20 ? 'selected' : '' }}>от 20 м²</option>
                                        </select>
                                    </div>
                                    <div class="form-input-wrap street">
                                        <input type="text" name="district" class="search-field b-left" @if(request()->input('district')) value="{{ request()->input('district') }}" @endif placeholder="Район">
                                        <input type="text" name="street" class="search-field b-left" @if(request()->input('street')) value="{{ request()->input('street') }}" @endif placeholder="Улица">
                                    </div>
                                </div>

                                <div class="col-auto ml-auto">
                                    <div class="form-inline text-white ext-floor">
                                        Этаж:
                                        <div class="form-check">
                                            <input id="notFirst" name="floor" value="1" type="checkbox" @if(request()->has('floor')) checked @endif class="form-check-input c-chbox">
                                            <label class="form-check-label" for="notFirst">Не первый</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="notLast" name="number_of_storeys" value="1" type="checkbox" @if(request()->has('number_of_storeys')) checked @endif class="form-check-input c-chbox">
                                            <label class="form-check-label" for="notLast">Не последний</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" style="display: none;"/>
                            <input type="hidden" name="sort" @if( request()->input('sort') == 'asc') value="desc" @else value="asc" @endif>
                            <div class="row justify-content-center row-search-btn">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1 col-extended-btn">
                                    <button id="advancedBtn" class="btn btn-outline-light btn-lg btn-block">
                                        <span class="adv">Расширенный</span>
                                        <span class="sim">Свернуть</span>
                                    </button>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1">
                                    <button  type="submit" class="btn btn-danger btn-lg btn-block"><i class="material-icons search-i-fix">search</i>Найти</button>
                                </div>
                            </div>
                        </form>
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

