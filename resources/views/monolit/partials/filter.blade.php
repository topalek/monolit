<form id="search" class="">
    <div class="row">
        <div class="col-12">
            <div class="filter-a">
                <div class="form-group">
                    <select class="form-control" name="city" id="city" data-tags="true" data-placeholder="-Город-">
                        @foreach($filterData['cities'] as $city)
                            <option value="{{$city}}">{{$city}}</option>
                        @endforeach
                    </select>
                </div>
                {{--                <div class="form-group">--}}
                {{--                    <select class="form-control" name="sale" id="category">--}}
                {{--                        <option value="">-Категория-</option>--}}
                {{--                        <option value="0" {{ ( request()->input('sale') == 0) ? 'selected' : '' }}>Продажа</option>--}}
                {{--                        <option value="1" {{ ( request()->input('sale') == 1) ? 'selected' : '' }}>Аренда</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                <div class="form-group">
                    <select class="form-control size" name="estate_type" id="type" data-tags="true"
                            data-placeholder="-Тип недвижимости-">
                        @foreach($filterData['types'] as $type)
                            <option value="{{$type}}">{{$type}}</option>
                        @endforeach
                        {{--                        <option value="Квартира" {{ (\Illuminate\Support\Facades\Input::get('estate_type') == 'Квартира') ? 'selected' : '' }}>--}}
                        {{--                            Квартира--}}
                        {{--                        </option>--}}
                        {{--                        <option value="Дом" {{ (\Illuminate\Support\Facades\Input::get('estate_type') == 'Дом') ? 'selected' : '' }}>--}}
                        {{--                            Дом--}}
                        {{--                        </option>--}}
                        {{--                        <option value="Коммерческая недвижимость" {{ (\Illuminate\Support\Facades\Input::get('estate_type') == 'Коммерческая недвижимость') ? 'selected' : '' }}>--}}
                        {{--                            Коммерческая недвижимость--}}
                        {{--                        </option>--}}
                        {{--                        <option value="Земельный участок" {{ (\Illuminate\Support\Facades\Input::get('estate_type') == 'Земельный участок') ? 'selected' : '' }}>--}}
                        {{--                            Земельный участок--}}
                        {{--                        </option>--}}
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control room_quantity" name="room_quantity" data-tags="true"
                            data-placeholder="-Комнаты-">
                        <option value="1" {{ request()->input('room_quantity') == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ request()->input('room_quantity')== 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ request()->input('room_quantity') == 3 ? 'selected' : '' }}>3</option>
                        <option value="4+" {{ request()->input('room_quantity') == '4+' ? 'selected' : '' }}>4+</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" name="price[]" class="form-control" min="500" step="50"
                           @if(request()->input('district')) value="{{ request()->input('district') }}"
                           @endif placeholder="Цена $ от">
                </div>
                <div class="form-group">
                    <input type="number" name="price[]" class="form-control" min="600" step="50" placeholder="До">
                </div>
            </div>

        </div>
    </div>
    <div id="advancedFields">
        <div class="form-group space">
            <select class="form-control" name="total_floor_space" id="space" data-tags="true"
                    data-placeholder="-Общая площадь-">
                @foreach($filterData['areas'] as $area)
                    <option value="{{$area}}">{{$area}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group district">
            <select class="form-control" name="district" id="district" data-tags="true" data-placeholder="-Район-">
                @foreach($filterData['districts'] as $district)
                    <option value="{{$district}}">{{$district}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group street">
            <select class="form-control" name="street" id="street" data-tags="true" data-placeholder="-Улица-">
                @foreach($filterData['streets'] as $street)
                    <option value="{{$street}}">{{$street}}</option>
                @endforeach
            </select>
        </div>
        {{--        <div class="col-12 d-flex justify-content-center flex-wrap mb-4">--}}

        {{--            <div class="form-input-wrap street">--}}

        {{--                <input type="text" name="district" class="search-field b-left" @if(request()->input('district')) value="{{ request()->input('district') }}" @endif placeholder="Район">--}}
        {{--                <input type="text" name="street" class="search-field b-left" @if(request()->input('street')) value="{{ request()->input('street') }}" @endif placeholder="Улица">--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="col-auto ml-auto">
            <div class="form-inline text-white ext-floor">
                Этаж:
                <div class="form-check">
                    <input id="notFirst" name="floor" value="1" type="checkbox" @if(request()->has('floor')) checked
                           @endif class="form-check-input c-chbox">
                    <label class="form-check-label" for="notFirst">Не первый</label>
                </div>
                <div class="form-check">
                    <input id="notLast" name="number_of_storeys" value="1" type="checkbox"
                           @if(request()->has('number_of_storeys')) checked @endif class="form-check-input c-chbox">
                    <label class="form-check-label" for="notLast">Не последний</label>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="sort" value="asc">

    <div class="row justify-content-center row-search-btn">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1 col-extended-btn">
            <button id="advancedBtn" class="btn btn-outline-light btn-lg btn-block">
                <span class="adv">Расширенный</span>
                <span class="sim">Свернуть</span>
            </button>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1">
            <button class="btn btn-danger btn-lg btn-block"><i class="material-icons search-i-fix">search</i>Найти
            </button>
        </div>
    </div>
</form>