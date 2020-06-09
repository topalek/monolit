<div class="item col-xs-12 col-md-4">
    <div class="thumbnail">
        @if(!is_null($_offers->photo))
            <img src="{{ $_offers->photo }}" alt="" class="group list-group-image" style="object-fit: cover; width: 400px; height: 250px;">
        @else
            <img src="{{ asset('images/'.str_slug($_offers->estate_type).'.jpg') }}" alt="" class="group list-group-image" style="object-fit: cover; width: 400px; height: 250px;">
        @endif
        <div class="caption">
            <h4 class="group inner list-group-item-heading">
                ${{$_offers->price < 10000 ? str_replace(',','', number_format($_offers->price)) : str_replace(',',' ', number_format($_offers->price)) }}</h4>
            @if($offer->estate_type != 'Земельный участок')
            <p class="group inner list-group-item-text">
                {{ $_offers->room_quantity }} - комн. кв., {{ $_offers->total_floor_space }} м², этаж: {{ $_offers->floor }}/{{ $_offers->number_of_storeys }}
            </p>
            @else
            <p class="group inner list-group-item-text">
                 Земельный участок {{ $_offers->total_floor_space }} м²
            </p>
            @endif
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <p class="lead">{{ $_offers->street }} @if($_offer->estate_type != 'Дом') {{ $_offer->house_no }} @endif</p>
                </div>
            </div>
        </div>
    </div>
</div>