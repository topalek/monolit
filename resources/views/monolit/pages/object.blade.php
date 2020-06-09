@section('og-meta')
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:image" content="https://monolit.sale/web_i/img/{{ $object->getAttributesObjectASC->where('p_tag', 'pic')->first()->item }}" />
@endsection

@extends('monolit.layouts.app')

@section('content')
<div class="container margin-from-menu">
    <div class="row justify-content-between mb-4">
        <div class="col-md-auto d-none d-md-block">
            {{--<a href="#" class="text-dark">Продажа</a> <b class="bread-div">→</b>--}}
            {{--<a href="#" class="text-dark">Квартиры</a> <b class="bread-div">→</b>--}}
            {{--<a href="#" class="text-dark">2-комнатные</a> <b class="bread-div">→</b>--}}
        </div>

        <div class="col-md-auto object-nav">
            <a href="{{ $urls[1] }}" class="text-dark">← Назад</a>
            <a href="{{ $urls[0] }}" class="text-dark ml-5">Следующий объект →</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 pr-lg-5">
            <h1 class="object-title">
                @if($object->sale == 1)
                    Аренда
                @else
                    Продажа
                @endif
                @if($object->estate_type == 'Коммерческая недвижимость')
                    Помещение,
                @elseif($object->estate_type == 'Дом')
                    {{ $object->room_quantity }} - комн. дом,
                @elseif($object->estate_type == 'Земельный участок')
                     - земельный участок,
                @else
                    {{ $object->room_quantity }} - комн. квартира,
                @endif
                {{ $object->street }} @if($object->estate_type != 'Дом') {{ $object->house_no }} @endif
            </h1>
            <div class="row mb-2">
                <div class="col">
                    г. {{ $object->city }}, {{ $object->district }}
                </div>
            </div>
            <div class="row row-object-stats">
                <div class="col-12 col-md-auto order-md-12 object-price d-lg-none">
                    ${{$object->price < 10000 ? str_replace(',','', number_format($object->price)) : str_replace(',',' ', number_format($object->price)) }}
                </div>
                <div class="col-auto object-data">
                    Общая
                    <div>{{ $object->total_floor_space }}м²</div>
                </div>
                @if($object->estate_type != 'Коммерческая недвижимость' && $object->estate_type != 'Земельный участок')
                    <div class="col-auto object-data">
                        Жилая
                        <div>{{ $object->floor_space }}м²</div>
                    </div>
                    <div class="col-auto object-data">
                        Кухня
                        <div>{{ $object->kitchen_floor_space }}м²</div>
                    </div>
                    <div class="col-auto object-data">
                        Этаж
                        <div>{{ $object->floor }}/{{ $object->number_of_storeys }}</div>
                    </div>
                @endif
            </div>
            <div class="row justify-content-between mb-4">
                <div class="col-md-auto col-order">
                    <div class="btn btn-order" data-open-modal="Review">Заказать просмотр</div>
                </div>
                <div class="col-md-auto align-self-center col-phone">
                    т.: <a href="tel:{{ $object->agent_phone_mobile }}" class="text-dark">{{ $object->agent_phone_mobile }}</a>, {{ $object->agent_first_name }}
                </div>
                <div class="col-md-auto align-self-center col-code">
                    <span class="object-code">Код: {{ $object->object_code }}</span>
                    <span class="object-views"><i class="material-icons">remove_red_eye</i> {{ $object->view_counter }}</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div id="sliderPreview" class="owl-carousel">

                        @foreach($object->getAttributesObjectASC->where('p_tag', 'pic') as $picture)
                            <div class="item"><img src="https://monolit.sale/web_i/img/{{$picture->item}}" data-slide-id="{{ $loop->index }}" alt="{{ $loop->iteration }}"></div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="about-object d-none show-mobile" style="margin-bottom: 10px">
                        {{ $object->description_detail }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="map" id="map">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="object-price d-none d-lg-flex">${{$object->price < 10000 ? str_replace(',','', number_format($object->price)) : str_replace(',',' ', number_format($object->price)) }}</div>
            <div class="about-object d-none d-lg-flex">
                {{ $object->description_detail }}
            </div>
        </div>
    </div>
</div>
@if($similar)
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="other-offers-title">Похожие предложения</div>
            </div>
            @each('monolit.partials.room', $similar, '_article')
        </div>
    </div>
@endif
@if($recentlyViewed)
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="h1 text-center">Недавно просмотренные</div>
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
        <br>
    </div>
@endif
<div id="Review" class="modal-bg no-x">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="bg-white">
                    <button class="btn btn-close-modal"></button>
                    <div class="modal-slide-title">Заказать просмотр</div>
                    <form action="{{ route('order.view.apartment') }}" method="POST" id="orderForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $object->object_code }}">
                        <div class="review-input-wrap">
                            <input type="text" name="name" id="" placeholder="Ваше имя">
                        </div>
                        <div class="review-input-wrap">
                            <input type="tel" name="phone" id="" placeholder="Ваш номер телефона">
                        </div>

                        <div class="wcon">Мы свяжемся с вами в самое ближайшее время.</div>

                        <button class="btn btn-order" type="submit">Отправить заявку</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="Modal" class="modal-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div id="owlModal" class="owl-carousel">
                    @foreach($object->getAttributesObjectASC->where('p_tag', 'pic') as $picture)
                        <div class="item"><img src="https://monolit.sale/web_i/img/{{$picture->item}}" data-slide-id="{{ $loop->index }}" alt="{{ $loop->iteration }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    html,body{ -webkit-overflow-scrolling : touch !important; overflow: auto !important; height: 100% !important; }
    .bg-light {
        background-color: #fff!important;    }
</style>
@endsection
@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW_7qNLBHJb8yL0nf-Yabm9kVLtkdxy90&callback=initMap" async defer></script>
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: 48.852647, lng: 37.606897}
        });
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
    }
    function geocodeAddress(geocoder, resultsMap) {
        geocoder.geocode({'address': '{{ $object->city }} {{ $object->street }}{{ $object->house_no }}'}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
            }
        });
    }

    $('#orderForm').submit(function (e) {
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                $('#Review').hide();
                $('#Review').find('input').val('');
                swal({
                    title: 'Успешно !',
                    text: 'Мы свяжемся с Вами в самое ближайшее время',
                    type: 'success',
                    confirmButtonText: 'Спасибо'
                })
            },
            error: function (data) {
                $('#Review').hide();
                swal({
                    title: 'Ошибка !',
                    text: 'Произошла ошибка отправки данных, проверьте правильность заполнения полей',
                    type: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        });
        e.preventDefault();
    });
</script>
@endpush