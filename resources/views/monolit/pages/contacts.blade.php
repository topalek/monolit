@extends('monolit.layouts.app')

@section('content')



<div class="margin-from-menu">

    <div class="other-offers-title">Контакты</div>

    <div id="map" style="height:500px"></div>

    <div id="marker1" class="small-marker">
        <div class="map-bg-img" style="background-image: url('../monolit/img/map-bg1.png')"></div>
        <div class="map-info">
            г. Славянск<br>
            ул. Васильевская д.‎52<br>
            т.: +38(095)2424011
        </div>
    </div>
    <div id="marker2" class="small-marker">
        <div class="map-bg-img" style="background-image: url('../monolit/img/map-bg2.png')"></div>
        <div class="map-info">
            г. Краматорск <br>
            ул. Василия Стуса д.66<br>
            т.: +38(095)2424011
        </div>
    </div>

</div>

<div class="container col-md-4 offset-md-4" style="margin-top: 50px">

    <div class="row justify-content-center mb-5">

        <div class="col">

            <div class="other-offers-title">Написать нам</div>

            <form action="{{ route('contacts') }}" method="POST" id="orderForm">

                {{ csrf_field() }}

                <div class="review-input-wrap">

                    <textarea name="message" required id="" cols="30" placeholder="Ваше сообщение" rows="2"></textarea>

                </div>

                <div class="review-input-wrap">

                    <input type="text" name="name" required id="" placeholder="Ваше имя">

                </div>

                <div class="review-input-wrap">

                    <input type="email" name="email" id="" placeholder="Ваш e-mail">

                </div>

                <div class="wcon">Мы свяжемся с вами в самое ближайшее время.</div>

                <button class="btn btn-order" type="submit">Отправить сообщение</button>

            </form>

        </div>

    </div>

</div>

@endsection



@push('js')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW_7qNLBHJb8yL0nf-Yabm9kVLtkdxy90&callback=initMap" async defer></script>

<script>

    $('#orderForm').submit(function (e) {

        $.ajax({

            type: $(this).attr('method'),

            url: $(this).attr('action'),

            data: $(this).serialize(),

            success: function (data) {

                $('#orderForm').find('input').val('');

                $('textarea').val('');

                swal({

                    title: 'Успешно !',

                    text: 'Мы свяжемся с Вами в самое ближайшее время',

                    type: 'success',

                    confirmButtonText: 'Спасибо'

                })

            },

            error: function (data) {

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