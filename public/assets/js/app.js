$(function () {
    'use strict';

    // Showing page loader
    $(window).load(function () {
        setTimeout(function () {
            $(".page_loader").fadeOut("fast");
        }, 100)
        $('link[id="style_sheet"]').attr('href', 'estate/css/skins/green-light.css');
        // $('.logo img').attr('src', 'estate/img/logos/green-light-logo.png');
    });

    // WOW animation library initialization
    var wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            mobile: false
        }
    );
    wow.init();

    // Banner slider
    (function ($) {
        //Function to animate slider captions
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $myCarousel = $('#carousel-example-generic')
        var $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        //Initialize carousel
        $myCarousel.carousel();

        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);
        //Pause carousel
        $myCarousel.carousel('pause');
        //Other slides to be animated on carousel slide event
        $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });
        $('#carousel-example-generic').carousel({
            interval: 3000,
            pause: "false"
        });
    })(jQuery);

    // Page scroller initialization.
    $.scrollUp({
        scrollName: 'page_scroller',
        scrollDistance: 300,
        scrollFrom: 'top',
        scrollSpeed: 500,
        easingType: 'linear',
        animation: 'fade',
        animationSpeed: 200,
        scrollTrigger: false,
        scrollTarget: false,
        scrollText: '<i class="fa fa-chevron-up"></i>',
        scrollTitle: false,
        scrollImg: false,
        activeOverlay: false,
        zIndex: 2147483647
    });

    // Counter
    function isCounterElementVisible($elementToBeChecked) {
        var TopView = $(window).scrollTop();
        var BotView = TopView + $(window).height();
        var TopElement = $elementToBeChecked.offset().top;
        var BotElement = TopElement + $elementToBeChecked.height();
        return ((BotElement <= BotView) && (TopElement >= TopView));
    }

    $(window).scroll(function () {
        $(".counter").each(function () {
            var isOnView = isCounterElementVisible($(this));
            if (isOnView && !$(this).hasClass('Starting')) {
                $(this).addClass('Starting');
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            }
        });
    });

    // Range sliders initialization
    $(".range-slider-ui").each(function () {
        var minValue = $(this).attr('data-min');
        var maxValue = $(this).attr('data-max');
        var unit = $(this).attr('data-unit');
        $(this).append("<input type='text' class='min-value' disabled/><input type='text' class='max-value' disabled/>");
        $(this).slider({
            range: true,
            min: minValue,
            max: maxValue,
            values: [minValue, maxValue],
            slide: function (event, ui) {
                event = event;
                $(this).children(".min-value").val(ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " " + unit);
                $(this).children(".max-value").val(ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " " + unit);
            }
        });
        $(this).children(".min-value").val($(this).slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " " + unit);
        $(this).children(".max-value").val($(this).slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " " + unit);
    });

    // Select picket
    $('.selectpicker').selectpicker();

    // Search option's icon toggle
    $('.search-options-btn').click(function () {
        $('.search-contents').toggleClass('show-search-area');
        $('.search-options-btn .fa').toggleClass('fa-chevron-down');
    });

    // Carousel with partner initialization
    (function () {
        $('#ourPartners').carousel({interval: 3600});
    }());

    (function () {
        $('.our-partners .item').each(function () {
            var itemToClone = $(this);
            for (var i = 1; i < 4; i++) {
                itemToClone = itemToClone.next();
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }
                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-" + (i))
                    .appendTo($(this));
            }
        });
    }());

    // Background video playing script
    // $(document).ready(function () {
    //     $(".player").mb_YTPlayer();
    // });

    // Multilevel menuus
    $('[data-submenu]').submenupicker();

    // Expending/Collapsing advance search content
    $('.show-more-options').click(function () {
        if ($(this).find('.fa').hasClass('fa-minus-circle')) {
            $(this).find('.fa').removeClass('fa-minus-circle');
            $(this).find('.fa').addClass('fa-plus-circle');
        } else {
            $(this).find('.fa').removeClass('fa-plus-circle');
            $(this).find('.fa').addClass('fa-minus-circle');
        }
    });

    var videoWidth = $('.sidebar-widget').width();
    var videoHeight = videoWidth * .61;
    $('.sidebar-widget iframe').css('height', videoHeight);

    // Dropzone initialization
    // Dropzone.autoDiscover = false;
    // $(function () {
    //     $("div#myDropZone").dropzone({
    //         url: "/file-upload"
    //     });
    // });

    // Filterizr initialization
    // $(function () {
    //     $('.filtr-container').filterizr();
    // });

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".fa")
            .toggleClass('fa-minus fa-plus');
    }

    $('.panel-group').on('shown.bs.collapse', toggleChevron);
    $('.panel-group').on('hidden.bs.collapse', toggleChevron);

    // Switching Color schema
    $('.color-plate').on('click', function () {
        var name = $(this).attr('data-color');
        $('link[id="style_sheet"]').attr('href', 'estate/css/skins/' + name + '.css');
        // if (name == 'default') {
        //     $('.logo img').attr('src', 'estate/img/logos/logo.png');
        // }
        // else {
        //     $('.logo img').attr('src', 'estate/img/logos/' + name + '-logo.png');
        // }
    });

    $('.setting-button').on('click', function () {
        $('.option-panel').toggleClass('option-panel-collased');
    });
});

// mCustomScrollbar initialization
(function ($) {
    $(window).resize(function () {
        var mapContainer = $(".map-content-sidebar");
        $('#map').css('height', $(this).height() - 110);
        if ($(this).width() > 768) {
            mapContainer.mCustomScrollbar(
                {theme: "minimal-dark"}
            );
            mapContainer.css('height', $(this).height() - 110);
        } else {
            mapContainer.mCustomScrollbar("destroy");
            mapContainer.css('height', '100%');
        }
    }).trigger("resize");
})(jQuery);

(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#selector > .btn').click(function() {
        var $this = $(this);
        var houses = $('#houses'); var apartment = $('#apartment');
        if (!$(this).hasClass('active') && $this.attr('href') === '#apartment') {
            $this.next().removeClass('active');
            houses.removeClass('active');apartment.addClass('active');
            $this.addClass('active');
            return loadData($this.attr('href'));
        } else if (!$(this).hasClass('active') && $this.attr('href') === '#houses') {
            $this.prev().removeClass('active');
            apartment.removeClass('active');houses.addClass('active');
            $this.addClass('active');
            return loadData($this.attr('href'));
        }
    });

    function loadData(type) {
        $('.apartment').html(''); $('.houses').html('');
        var jqxhr = $.post('/load/apartments', { 'type': type })
            .success(function(done) {
                var $html = $();
                for(var i = 0; i < done.data.length; i++) {
                    var img = (!done.data[i]['photo']) ? 'http://web.monolit.space/monolit/img/no-images.jpg' : done.data[i]['photo'];
                    $html = $html.add('<div class="col-lg-4 col-md-4 col-sm-6 wow fadeInUp delay-03s">' +
                        '<div class="thumbnail recent-properties-box">' +
                        '<img src="'+img+'" alt="" class="img-responsive" style="width: 100%; height: 300px; object-fit: cover;">' +
                        '<div class="caption detail">' +
                        '<header>' +
                        '<div class="price">'+done.data[i]['price'].formatMoney(2)+' '+done.data[i]['price_currency']+'</div>' +
                        '</header>' +
                        '<h3 class="location">' +
                        '<a href="">'+done.data[i]['room_quantity']+' - комн. кв., '+done.data[i]['total_floor_space']+' '+done.data[i]['floor_area_unit']+', этаж: '+done.data[i]['floor']+'/'+done.data[i]['number_of_storeys']+'</a>' +
                        '</h3>' +
                        '<div class="footer">' +
                        '<a>'+done.data[i]['street']+'</a>' +
                        '</div>' +
                        '</div></div></div>');
                }

                if ($('.recent').find('.active').attr('href') === '#apartment') {
                    return $('.apartment').append($html);
                } else {
                    return $('.houses').append($html);
                }
            })
            .error(function(fail) {
                return viewAlert(JSON.parse(fail.responseText).status);
            });
    }
})(jQuery);


function viewAlert(status) {
    switch (status) {
        case 404:
            $.notify("Ошибка получения данных", {
                // whether to hide the notification on click
                clickToHide: true,
                // whether to auto-hide the notification
                autoHide: true,
                // if autoHide, hide after milliseconds
                autoHideDelay: 5000,
                // show the arrow pointing at the element
                arrowShow: true,
                // arrow size in pixels
                arrowSize: 5,
                // position defines the notification position though uses the defaults below
                position: '...',
                // default positions
                elementPosition: 'bottom left',
                globalPosition: 'top right',
                // default style
                style: 'bootstrap',
                // default class (string or [string])
                className: 'error',
                // show animation
                showAnimation: 'slideDown',
                // show animation duration
                showDuration: 400,
                // hide animation
                hideAnimation: 'slideUp',
                // hide animation duration
                hideDuration: 200,
                // padding between element and notification
                gap: 2
            });
            break;
        case 403:
            break;
        default:
            break;
    }

    function viewObjects(data) {
        alert(data);
    }
}

Number.prototype.formatMoney = function(c, d, t){
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};