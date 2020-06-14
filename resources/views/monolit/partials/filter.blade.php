<form id="search" class="" action="{{url('filter')}}">
    <div class="row">
        <div class="col-12">
            <div class="filter-a">
                <div class="form-group city">
                    <select class="form-control" name="city" id="city" data-tags="true" data-placeholder="-Город-"
                            data-allow-clear="true">
                        <option></option>
                        @foreach($filterData['cities'] as $city)
                            <option value="{{$city}}"{{ ( request()->input('city') == $city) ? 'selected' : '' }}>{{$city}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group type">
                    <select class="form-control size" name="type" id="type" data-tags="true"
                            data-placeholder="-Тип недвижимости-" data-allow-clear="true">
                        <option></option>
                        @foreach($filterData['types'] as $type)
                            <option value="{{$type}}" {{ ( request()->input('type') == $type) ? 'selected' : '' }}>{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group rooms">
                    <select class="form-control room_quantity" name="rooms[]" data-tags="true"
                            data-placeholder="-Комнаты-" data-allow-clear="true" multiple>
                        <option></option>
                        <option value="1" {{ in_array("1",request()->input('rooms'))  ? 'selected' : '' }}>1</option>
                        <option value="2" {{ in_array("2",request()->input('rooms')) ? 'selected' : '' }}>2</option>
                        <option value="3" {{ in_array("3",request()->input('rooms')) ? 'selected' : '' }}>3</option>
                        <option value="4+" {{ in_array("4+",request()->input('rooms')) ? 'selected' : '' }}>4+</option>
                    </select>
                </div>
                <div class="form-group price-from">
                    <input type="number" name="price[]" class="form-control" min="500" inputmode="decimal" step="50"
                           placeholder="Цена $ от">
                </div>
                <div class="form-group price-to">
                    <input type="number" name="price[]" class="form-control" inputmode="decimal" min="600" step="50"
                           placeholder="До">
                </div>
            </div>

        </div>
    </div>
    <div id="advancedFields">
        <div class="wrapper">
            <div class="form-group space">
                <select class="form-control" name="area" id="space" data-tags="true"
                        data-placeholder="-Общая площадь-" data-allow-clear="true">
                    <option></option>
                    @foreach($filterData['areas'] as $area)
                        <option value="{{$area}}" {{ ( request()->input('area') == $area) ? 'selected' : '' }}>{{$area}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group district">
                <select class="form-control" name="district" id="district" data-tags="true" data-placeholder="-Район-"
                        data-allow-clear="true">
                    <option></option>
                    @foreach($filterData['districts'] as $district)
                        <option value="{{$district}}" {{ ( request()->input('district') == $district) ? 'selected' : '' }}>{{$district}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group street">
                <select class="form-control" name="street" id="street" data-tags="true" data-placeholder="-Улица-"
                        data-allow-clear="true">
                    <option></option>
                    @foreach($filterData['streets'] as $street)
                        <option value="{{$street}}" {{ ( request()->input('street') == $street) ? 'selected' : '' }}>{{$street}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-auto ml-auto">
            <div class="form-inline text-white ext-floor">
                Этаж:
                <div class="form-check">
                    <input id="notFirst" name="notFirst" value="1" type="checkbox"
                           @if(request()->has('notFirst')) checked
                           @endif class="form-check-input c-chbox">
                    <label class="form-check-label" for="notFirst">Не первый</label>
                </div>
                <div class="form-check">
                    <input id="notLast" name="notLast" type="checkbox"
                           @if(request()->has('notLast')) checked @endif class="form-check-input c-chbox">
                    <label class="form-check-label" for="notLast">Не последний</label>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="sort" value="">

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
