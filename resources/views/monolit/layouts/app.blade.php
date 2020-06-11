<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{{ $title ? $title : 'Монолит' }}</title>
    <meta name="description" content="{{ $description ? $description : 'Монолит' }}" />
    @yield('og-meta')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('monolit/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/icons.css') }}">
    <link rel="stylesheet" href="{{ url('//fonts.googleapis.com/css?family=Material+Icons') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/custom-card.css') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/custom-tabs.css') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/custom-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/search-form.css') }}">
    <link rel="stylesheet" href="{{ asset('monolit/css/owl.carousel.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('monolit/css/object.css') }}">
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PRLL6QC');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PRLL6QC"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- top bar -->
<div class="top-bar fixed-top d-none d-md-block">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-6">
                <form action="{{ route('search.apartment') }}" method="GET">
                    <div class="search-by-code-wrap">
                        <button class="btn-sbc" type="submit"><i class="material-icons">search</i></button>
                        <input type="text" class="form-sbc" name="search" placeholder="Поиск по коду">
                    </div>
                </form>
            </div>
            <div class="col-6">
                <a href="tel:(095) 242 40 11" class="top-bar-phone"><i class="material-icons">phone_iphone</i>(095) 242 40 11</a>
            </div>
        </div>
    </div>
</div>

<!-- header -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="{{ url('/') }}" style="width: 100px">
            <img src="{{ asset('monolit/img/logo.png') }}" class="brand-img" alt="">
        </a>

        <a href="tel:(095) 242 40 11" class="top-bar-phone d-md-none"><i class="material-icons">phone_iphone</i>(095) 242 40 11</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-plank"></span>
            <span class="navbar-plank"></span>
            <span class="navbar-plank"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!--
                    добавлять класс active
                    <li class="nav-item active">
                -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('company') }}">Компания</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('realty') }}">Недвижимость</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                </li>
                <li class="nav-item d-md-none">
                    <form action="{{ route('search.apartment') }}" method="GET">
                        <div class="search-by-code-wrap">
                            <button class="btn-sbc" type="submit"><i class="material-icons">search</i></button>
                            <input type="text" class="form-sbc" name="search" placeholder="Поиск по коду">
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('filter')

@yield('content')
<footer class="bg-dark">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-sm-2">
                <ul class="list-unstyled footer-nav-links">
                    <li><a href="{{ route('company') }}" class="text-white">Компания</a></li>
                    <li><a href="{{ url('realty') }}" class="text-white">Недвижимость</a></li>
                    <li><a href="{{ route('contacts') }}" class="text-white">Контакты</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-auto">
                <div class="footer-socials">
                    <div class="footer-soc-links">
                        <a href="https://www.facebook.com/revishviliotar/" class="soc-link" target="_blank">
                            <svg class="fb-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.7 23.5">
                                <path fill="#FFFFFF" d="M8.9,3.6h1.8V0H8.9c-3,0-5.3,2.4-5.3,5.6v3.7H0v3.6h3.6v10.7h3.6V12.8h3.6V9.2H7.1V5.6
										C7.1,4.6,7.8,3.6,8.9,3.6z"/>
                            </svg>
                        </a>
                        {{--<a href="#" class="soc-link">--}}
                            {{--<svg class="tw-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.2 14">--}}
                                {{--<path fill="#FFFFFF" d="M17.2,1.6c-0.6,0.3-1.3,0.5-2,0.6c0.7-0.4,1.3-1.1,1.5-2C16,0.7,15.3,1,14.5,1.1C13.8,0.4,12.9,0,11.9,0--}}
										{{--C9.9,0,8.4,1.6,8.4,3.5c0,0.3,0,0.5,0.1,0.8C5.5,4.2,2.9,2.8,1.2,0.7C0.9,1.2,0.7,1.8,0.7,2.4c0,1.2,0.6,2.3,1.6,2.9--}}
										{{--c-0.6,0-1.1-0.2-1.6-0.4c0,0,0,0,0,0c0,1.7,1.2,3.1,2.8,3.5C3.2,8.5,2.9,8.6,2.6,8.6c-0.2,0-0.4,0-0.7-0.1--}}
										{{--c0.5,1.4,1.8,2.4,3.3,2.4c-1.2,0.9-2.7,1.5-4.4,1.5c-0.3,0-0.6,0-0.8,0c1.6,1,3.4,1.6,5.4,1.6c6.5,0,10-5.4,10-10.1--}}
										{{--c0-0.2,0-0.3,0-0.5C16.1,3,16.7,2.4,17.2,1.6z"/>--}}
                            {{--</svg>--}}
                        {{--</a>--}}
                        <a href="https://www.instagram.com/monolit.sale/" target="_blank" class="soc-link">
                            <svg class="in-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 108 108.5">
                                <path fill="#FFFFFF" d="M81,0H27C12.1,0,0,12.1,0,27v54.5c0,14.9,12.1,27,27,27h54c14.9,0,27-12.1,27-27V27C108,12.1,95.9,0,81,0z
										M74.9,19.1c0-1.6,1.3-3,3-3h9.3c1.7,0,3,1.4,3,3v9.3c0,1.6-1.3,3-3,3h-9.3c-1.7,0-3-1.4-3-3V19.1z M54.6,46.5
										c5.9,0,10.6,4.8,10.6,10.6c0,5.9-4.8,10.6-10.6,10.6s-10.6-4.8-10.6-10.6C43.9,51.3,48.7,46.5,54.6,46.5z M98,81.5
										c0,9.4-7.6,17-17,17H27c-9.4,0-17-7.6-17-17V46.3h21.4c-1.6,3.3-2.4,7-2.4,10.9c0,14.1,11.5,25.6,25.6,25.6s25.6-11.5,25.6-25.6
										c0-3.9-0.9-7.6-2.4-10.9H98V81.5z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="copyright">© 2018 Все права защищены.</div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end-->

<script src="{{ asset('monolit/js/jquery.min.js') }}"></script>
<script src="{{ asset('monolit/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('monolit/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('monolit/js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('monolit/js/js.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@stack('js')
<script>
    $(document).ready(function() {
        if($('#category option:selected').val() == 1) {
            $("#type option[value='Дом']").attr('disabled','disabled');
            $("#type option[value='Земельный участок']").attr('disabled','disabled');
            $('.other').hide();
            $('.arenda').show();
            $(".arenda").removeAttr('disabled','disabled');
            $(".other").attr('disabled','disabled');
        }

        if($('#type option:selected').val() == 'Коммерческая недвижимость' || $('#type option:selected').val() == 'Земельный участок') {
            $(".room_quantity").attr('disabled','disabled');
            $(".floor_space").attr('disabled','disabled');
            $(".kitchen_floor_space").attr('disabled','disabled');
            $("#notFirst").attr('disabled','disabled');
            $("#notLast").attr('disabled','disabled');
        }
        $('#category').on('change', function() {
            if(this.value == 1){
                $("#type option[value='Дом']").attr('disabled','disabled')
                $("#type option[value='Земельный участок']").attr('disabled','disabled')
                $('.other').hide();
                $('.arenda').show();
                $(".arenda").removeAttr('disabled','disabled')
                $(".other").attr('disabled','disabled')

            } else {
                $("#type option[value='Дом']").removeAttr('disabled','disabled')
                $("#type option[value='Земельный участок']").removeAttr('disabled','disabled')
                $('.other').show();
                $('.arenda').hide();
                $(".other").removeAttr('disabled','disabled')
                $(".arenda").attr('disabled','disabled')
            }
        });

        $('#type').on('change', function() {
            if(this.value == 'Коммерческая недвижимость' || this.value == 'Земельный участок'){
                $(".room_quantity").attr('disabled','disabled');
                $(".floor_space").attr('disabled','disabled');
                $(".kitchen_floor_space").attr('disabled','disabled');
                $("#notFirst").attr('disabled','disabled');
                $("#notLast").attr('disabled','disabled');
            } else {
                $(".room_quantity").removeAttr('disabled','disabled');
                $(".floor_space").removeAttr('disabled','disabled');
                $(".kitchen_floor_space").removeAttr('disabled','disabled');
                $("#notFirst").removeAttr('disabled','disabled');
                $("#notLast").removeAttr('disabled','disabled');
            }
        });

        if($(window).scrollTop() >= 100){
            $('.bg-light').addClass('white');
        }

        $(window).scroll(function(){
            if ($(window).scrollTop() >= 100) {
                $('.bg-light').addClass('white');
            }
            else {
                $('.bg-light').removeClass('white');
            }
        });

    });
    function saveView(data) {
        $.ajax({
            type: 'GET',
            url: '{{ url('/save-view') }}/'+data,
            success: function (data) {
            },
            error: function (data) {

            }
        });
    }
</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '242626122922116');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=242626122922116&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123176825-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123176825-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
  (function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
      try {
        w.yaCounter49823047 = new Ya.Metrika2({
          id:49823047,
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:true
        });
      } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = "https://mc.yandex.ru/metrika/tag.js";

    if (w.opera == "[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
  })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/49823047" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{--<script type="text/javascript" src="{{ asset('assets/js/ie10-viewport-bug-workaround.js') }}"></script>--}}
<!-- Custom javascript -->
{{--<script type="text/javascript" src="{{ asset('assets/js/ie10-viewport-bug-workaround.js') }}"></script>--}}
</body>
</html>