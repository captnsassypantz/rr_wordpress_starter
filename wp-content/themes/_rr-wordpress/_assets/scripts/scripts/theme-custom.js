// Parallax plugin
if( ! (/Android|iPhone|iPad|iPod|BlackBerry/i).test(navigator.userAgent || navigator.vendor || window.opera) ){
	var s = skrollr.init({
		smoothScrolling: false,
		smoothScrollingDuration: 10,
		forceHeight: false,
		edgeStrategy: 'set',
		easing: {
			WTF: Math.random,
			inverted: function(p) {
				return 1-p;
			}
		}
	});
}

jQuery(function($){

	// Optimize Nav Experience
	$(document).ready(function() {
		$('.menu-item-has-children > a').attr('onClick', 'return false;');

		$('#SiteNavigation.SimpleResponsiveNav .menu-item-has-children > a').each(function(){
			$(this).on('click', function(){
				if ( $(window).width() <= 750 ) {
					$(this).next().slideToggle();
				}
			});
		});

		$('#SiteNavigation.SimpleResponsiveNav #MobileToggle').click(function(){
			if ( $(window).width() <= 750 ) {
				$(this).next().slideToggle();
			}
		});
	});

	  $(window).load(function() {
   		 $('.flexslider').flexslider({
   		 	slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
   		 	controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
   		 });
 	 });

	// Image lazyload
	$(document).ready(function() {
		$('.image-defer').unveil(200, function() {
			$(this).load(function() {
				this.style.opacity = 1;
			});
		});
		// $('.image-defer').lazyload({
		// 	effect : "fadeIn",
		// 	threshold: -200
		// });
	});

	// Slider - slick.js
	$(document).ready(function($) {
		$('.gallery').slick({
			centerMode: true,
			centerPadding: '15px',
			lazyLoad: 'ondemand',
			slidesToShow: 3,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						arrows: true,
						centerMode: true,
						centerPadding: '15px',
						slidesToShow: 3
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: true,
						centerMode: true,
						centerPadding: '15px',
						slidesToShow: 1
					}
				}
			]
		});
	});

	// Select field holder
	$(document).ready(function(){
		$('select').wrap('<div class="select-holder"></div>');
		$('input[type="search"]').wrap('<div class="input-search-holder"></div>');
		$('input[type="submit"]').wrap('<div class="input-submit-wrapper"></div>');
		$('input[type="submit"]').click(function(){
			$(this).parent().addClass('bco-submit-animation');
		});
	});

	// For loading animation
	$(document).ready(function(){
		setTimeout(function(){ $('html').addClass('after-load-1000'); }, 1000);
		setTimeout(function(){ $('html').addClass('after-load-1500'); }, 1500);
		setTimeout(function(){ $('html').addClass('after-load-2000'); }, 2000);
	});

	// Scroll header class
	$(document).ready(function(){
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			if (scroll >= 100) {
				$('body').addClass('header-scrolled');
			} else {
				$('body').removeClass('header-scrolled');
			}
		});
	});

	// Mobile menu stuff
	$('#bcorr-navigation').click(function(){
		if ( ! $('html').hasClass('mobile-navigation-active') ) {
			$('html').addClass('mobile-navigation-active');
		} else {
			$('html').removeClass('mobile-navigation-active');
		}
	});

	$('#close-navigation-popout').click(function(){
		$('html').removeClass('mobile-navigation-active');
	});

	$(document).on('click', '#close-navigation', function(){
		$('html').removeClass('mobile-navigation-active');
	});

	$(document).ready(function() {
		$('#mobile-navigation .menu-item-has-children > a').append('<i class="fa fa-angle-down"></i>');
		$('.IDX-carouselNextArrow').append('<i class="fa fa-caret-right" aria-hidden="true"></i>');
		$('.IDX-carouselPrevArrow').append('<i class="fa fa-caret-left" aria-hidden="true"></i>');

		// $('#mobile-navigation .menu > li:last-of-type').after('<li id="close-navigation" class="menu-item"><a href="#0">Close Menu <i class="fa fa-close"></i></a></li>');
	});

	jQuery(function($) {

	function bcoWolfnetFixes() {
		$('.wolfnet_widgetPrice > div:first-of-type, .wolfnet_widgetPrice > div:nth-of-type(2), .wolfnet_widgetBeds, .wolfnet_widgetBaths').addClass('fa fa-angle-down');
		$('select[name="min_bedrooms"] option:first-of-type').html('Beds');
		$('select[name="min_bathrooms"] option:first-of-type').html('Baths');
		$('button.wolfnet_quickSearchForm_submitButton').html('Search');
	}
	bcoWolfnetFixes();

	});

	$('#mobile-navigation .menu-item-has-children > a').click(function(){
		$(this).next().slideToggle( 300 );
	});

	// Fit vids
	$(document).ready(function() {
		$('body').fitVids();
	});

	$(document).ready(function(){
		$('*[class^="wp-image"]').parent().featherlight();
		$('.gallery a').featherlightGallery();
	});

	// Gravity forms field animation classes
	$(document).ready(function(){
		var gfields = $('li.gfield .ginput_container input, li.gfield .ginput_container textarea');
		gfields.focus(function(){
			$(this).parent().parent().addClass('field-active');
		});
		gfields.blur(function(){
			$(this).parent().parent().removeClass('field-active');
			if( $(this).val().length !== 0 ) {
				$(this).parent().parent().addClass('field-complete');
			} else {
				$(this).parent().parent().removeClass('field-complete');
			}
		});
	});

	// Smooth scroll on anchor links
	$(document).ready(function(){
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
		});
	});

	// Sticky elements
	$(document).ready(function(){
		if ( $('.sticky-element').length ) {
			$('.sticky-element').each(function(){
				var sticky = new Waypoint.Sticky({
					element: $(this)
				});
			});
		}
	});

	// Inview
	var wow = new WOW({
		boxClass: 'element-inview',
	});
	wow.init();

});
