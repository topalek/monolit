@extends('monolit.layouts.app')

@section('filter')
    <div class="mt-head position-relative">
        <div class="select-form-wrap container">
            <div class="row">
                <div class="col">
                    <h1 class="main-slogan" style="text-transform: uppercase">Агентство по продаже и аренде недвижимости</h1>
                    <div class="search-bg">
                        <form action="{{ url('filter') }}" id="Search" class="">
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
                                            <option value="0" {{ ( request()->input('sale') == 0) ? 'selected' : '' }}>Продажа</option>
                                            <option value="1" {{ ( request()->input('sale') == 1) ? 'selected' : '' }}>Аренда</option>
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
                                            <option value="2" {{ request()->input('room_quantity')== 2 ? 'selected' : '' }}>2</option>
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
                                            <input id="notFirst" name="floor" value="1" type="checkbox" class="form-check-input c-chbox">
                                            <label class="form-check-label" for="notFirst">Не первый</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="notLast" name="number_of_storeys" value="1" type="checkbox" class="form-check-input c-chbox">
                                            <label class="form-check-label" for="notLast">Не последний</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" style="display: none;"/>
                            <input type="hidden" name="sort" value="asc">

                            <div class="row justify-content-center row-search-btn">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1 col-extended-btn">
                                    <button id="advancedBtn" class="btn btn-outline-light btn-lg btn-block">
                                        <span class="adv">Расширенный</span>
                                        <span class="sim">Свернуть</span>
                                    </button>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1">
                                    <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="material-icons search-i-fix">search</i>Найти</button>
                                </div>
                            </div>
                        </form>
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
