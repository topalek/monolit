$('#advancedBtn').click(function (e) {
	e.preventDefault();
	$(this).unbind('mouseout');
	$('#search').toggleClass('extended-search');
	$('#advancedFields').slideToggle({
		duration: 300,
	});
	// $(this).prop("disabled", true);
	// $('#advancedFields').slideToggle({
	// 	duration: 200,
	// 	start: function () {
	// 		$(this).css({
	// 			display: "grid"
	// 		})
	// 	},
	// 	done: function() {
	//
	// 		$.each($('#advancedFields select, #advancedFields input'), function(i, v) {
	// 			$(v).val('');
	// 		});
	// 		$.each($('#advancedFields input[type=checkbox]'), function(i, v) {
	// 			$(v).prop('checked', false);
	// 		});
	// 	}
	// });

});

$.scrollUp({
	scrollText: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103 189.5"><polyline fill="none" stroke="#000000" stroke-width="12" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="7.1,61.9 51.6,6.9 96.1,63.8 56,63.8 "/><line fill="none" stroke="#000000" stroke-width="12" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="56" y1="63.8" x2="56" y2="181.8"/></svg>Наверх'
});

var coor = {x:0, y:0};
$('#sliderPreview .item img').mousedown(function(e) {
	coor.x = e.pageX;
	coor.y = e.pageY;
});
$('#sliderPreview .item img').mouseup(function (e) { // РѕС‚РєСЂС‹РІР°РµРј РјРѕРґР°Р»РєСѓ
	var slideId = $(this).data('slide-id');

	modalSlider.trigger("to.owl.carousel", [slideId]);
	if (e.pageX == coor.x && e.pageY == coor.y && $(window).width() >= 768) {
		$('#Modal').fadeIn({
			duration: 200,
			start: function () {
				$('body').addClass('modal-open');
			}
		});
	}
});

var previewPics = $('#sliderPreview').owlCarousel({
	loop: false,
	margin: 10,
	nav: true,
	dots: false,
	responsive: {
		0: {
			items: 1
		},
		768: {
			items: 5
		}
	},
	navText: ['', ''],
	onInitialized: counter,
	onTranslated: counter
});


var modalSlider = $('#owlModal').owlCarousel({
	loop: false,
	dots: false,
	nav: true,
	margin: 0,
	items: 1,
	navText: ['', ''],
	// onRefreshed: adjustNav,
	onChanged: counterBig
	// onTranslated: adjustNav
});

$("body").keydown(function (e) {
	if (e.keyCode == 37) { // left
		modalSlider.trigger('prev.owl.carousel');
	} else if (e.keyCode == 39) { // right
		modalSlider.trigger('next.owl.carousel');
	}
});

$('.modal-bg').click(function (e) { // РїСЂРё РєР»РёРєРµ РЅР° Р±Рі РјРѕРґР°Р»РєРё, Р·Р°РєСЂС‹РІР°РµРј РµРµ
	if (e.target === this) {
		$(this).fadeOut({
			duration: 200,
			start: function () {
				$('body').removeClass('modal-open');
			}
		});
	}
});

$('.btn-close-modal').click(function() {
	$(this).closest(".modal-bg").fadeOut({
		duration: 200,
		start: function () {
			$('body').removeClass('modal-open');
		}
	});
});

$('[data-open-modal]').click(function () {
	var modalId = $(this).data('open-modal');

	$('#' + modalId).fadeIn({
		duration: 200,
		start: function () {
			$('body').addClass('modal-open');
		}
	});
});

$('#gridView').click(function (e) {
	e.preventDefault();
	$(this).addClass('active');

	$('#listView').removeClass('active');
	$('#searchResults').addClass('result-grid').removeClass('result-list');
});

$('#listView').click(function (e) {
	e.preventDefault();
	$(this).addClass('active');

	$('#gridView').removeClass('active');
	$('#searchResults').addClass('result-list').removeClass('result-grid');
});

function makeThumbs() {
	$.each(this._items, function (i) {
		$('.owl-dots .owl-dot').eq(i)
			.css({
				'background': 'url(' + $(this).find('img').attr('src') + ')',
				'background-size': 'cover'
			})
	});
}

function counter(event) {
	var items = event.item.count;
	var item = event.item.index + 1;
	if (!$('#count').length) {
		$('#sliderPreview').append('<div id="count"></div>');
	}
	$('#count').html('фото ' + item + ' из ' + items);
}
function counterBig(event) {
	var items = event.item.count;
	var item = event.item.index + 1;
	if (!$('#countBig').length) {
		$('#owlModal').before('<div id="countBig"></div>');
	}
	$('#countBig').html('' + item + '/' + items);
}
function adjustNav() {
	var w = $('#owlModal .owl-item.active img').width() + 60;
	$('#owlModal .owl-nav').animate({
		width: w,
		marginLeft: "-" + w/2
	}, 200, function () {
		// Animation complete.
	});
}



function getScrollbarWidth() {
	var scrollDiv = document.createElement('div');
	scrollDiv.className = 'modal-scrollbar-measure';
	document.body.appendChild(scrollDiv);
	var scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth;
	document.body.removeChild(scrollDiv);
	return scrollbarWidth;
};

var map, popup1, popup2, Popup;

/** Initializes the map and the custom popup. */
function initMap() {
	definePopupClass();
	// 48.800201, 37.589453
	map = new google.maps.Map(document.getElementById('map'), {
		center: { //координаты центра карты
			lat: 48.800,
			lng: 37.589
		},
		zoom: 11,
	});

	popup1 = new Popup(
		new google.maps.LatLng(48.8544, 37.6003), //координаты попапа
		document.getElementById('marker1'));

	popup2 = new Popup(
		new google.maps.LatLng(48.7335, 37.584), //координаты попапа
		document.getElementById('marker2'));
	popup1.setMap(map);
	popup2.setMap(map);
}

/** Defines the Popup class. */
function definePopupClass() {
	/**
	 * A customized popup on the map.
	 * @param {!google.maps.LatLng} position
	 * @param {!Element} content
	 * @constructor
	 * @extends {google.maps.OverlayView}
	 */
	Popup = function (position, content) {
		this.position = position;

		content.classList.add('popup-bubble-content');

		var pixelOffset = document.createElement('div');
		pixelOffset.classList.add('popup-bubble-anchor');
		pixelOffset.appendChild(content);

		this.anchor = document.createElement('div');
		this.anchor.classList.add('popup-tip-anchor');
		this.anchor.appendChild(pixelOffset);

		content.addEventListener('click', function() {
			if(this.classList.contains('small-marker')) {
				map.setCenter({
					lat: position.lat() + 0.0005,
					lng: position.lng()
				});
				map.setZoom(17);
			} else {
				map.setCenter({
					lat: 48.8,
					lng: 37.589
				});
				map.setZoom(11);
			}
			this.classList.toggle('small-marker');
		});
		// Optionally stop clicks, etc., from bubbling up to the map.
		this.stopEventPropagation();
	};
	// NOTE: google.maps.OverlayView is only defined once the Maps API has
	// loaded. That is why Popup is defined inside initMap().
	Popup.prototype = Object.create(google.maps.OverlayView.prototype);

	/** Called when the popup is added to the map. */
	Popup.prototype.onAdd = function () {
		this.getPanes().floatPane.appendChild(this.anchor);
	};

	/** Called when the popup is removed from the map. */
	Popup.prototype.onRemove = function () {
		if (this.anchor.parentElement) {
			this.anchor.parentElement.removeChild(this.anchor);
		}
	};

	/** Called when the popup needs to draw itself. */
	Popup.prototype.draw = function () {
		var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);
		// Hide the popup when it is far out of view.
		var display =
			Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
				'block' :
				'none';

		if (display === 'block') {
			this.anchor.style.left = divPosition.x + 'px';
			this.anchor.style.top = divPosition.y + 'px';
		}
		if (this.anchor.style.display !== display) {
			this.anchor.style.display = display;
		}
	};

	/** Stops clicks/drags from bubbling up to the map. */
	Popup.prototype.stopEventPropagation = function () {
		var anchor = this.anchor;
		anchor.style.cursor = 'auto';

		['click', 'dblclick', 'contextmenu', 'wheel', 'mousedown', 'touchstart',
			'pointerdown'
		]
			.forEach(function (event) {
				anchor.addEventListener(event, function (e) {
					e.stopPropagation();
				});
			});
	};
}

$(document).ready(function () {
	$('#search select.form-control').each((i, el) => {
		$(el).select2();
	});
});
