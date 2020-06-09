<div class="col-sm-6 col-md-4 mb-4">
    <a href="{{ route('view.object', ['link' => $_article->object_code]) }}" class="card">
        @if(!is_null($_article->photo))
            <img src="{{ $_article->photo }}" alt="" class="card-img-top" style="width: 100%;height: 300px;object-fit: cover;">
        @else
            <img src="{{ asset('images/'.str_slug($_article->estate_type).'.jpg') }}" alt="" class="card-img-top" style="width: 100%;height: 300px;object-fit: cover;">
        @endif
        <div class="card-body">
            <h4 class="card-title card-price">${{$_article->price < 10000 ? str_replace(',','', number_format($_article->price)) : str_replace(',',' ', number_format($_article->price)) }}</h4>
            <p class="card-text">
                <span class="card-adress">
                    @if($_article->estate_type != 'Земельный участок')
                    @if($_article->estate_type == 'Дом')
                        {{ $_article->room_quantity }} комн. дом,
                    @else
                        {{ $_article->room_quantity }} комн. кв.,
                    @endif
                    {{ $_article->total_floor_space }} м², этаж: {{ $_article->floor }}/{{ $_article->number_of_storeys }}
                    @else
                        Земельный участок {{ $_article->total_floor_space }} м²
                    @endif
                </span>
                {{ $_article->street }} @if($_article->estate_type != 'Дом') {{ $_article->house_no }} @endif
            </p>
        </div>
    </a>
</div>