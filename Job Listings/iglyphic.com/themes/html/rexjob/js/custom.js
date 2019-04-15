 jQuery(document).ready(function () {
    'use strict';
    /*** =====================================
    * 	Mobile Menu
    * =====================================***/
	$('.mobile-background-nav .has-submenu').on('click',function(e) {
	  	e.preventDefault();
	    var $this = $(this);
	    if ($this.next().hasClass('menu-show')) {
	        $this.next().removeClass('menu-show');
	        $this.next().slideUp(350);
	    } else {
	        $this.parent().parent().find('li .dropdown').removeClass('menu-show');
	        $this.parent().parent().find('li .dropdown').slideUp(350);
	        $this.next().toggleClass('menu-show');
	        $this.next().slideToggle(350);
	    }
	});
	$('.mobile-menu-close i').on('click',function(){
	     $('.mobile-background-nav').removeClass('in');
	});
	$('#humbarger-icon').on('click',function(e){
        e.preventDefault();
	     $('.mobile-background-nav').toggleClass('in');
	});
    /*** =====================================
    * Easy Menu
    * =====================================***/
	(function($) {
	    $.fn.menumaker = function(options) {
	        var cssmenu = $(this),
	            settings = $.extend({
	                format: "dropdown",
	                sticky: false
	            }, options);
	        return this.each(function() {
	            $(this).find(".button").on('click', function() {
	                $(this).toggleClass('menu-opened');
	                var mainmenu = $(this).next('ul');
	                if (mainmenu.hasClass('open')) {
	                    mainmenu.slideToggle().removeClass('open');
	                } else {
	                    mainmenu.slideToggle().addClass('open');
	                    if (settings.format === "dropdown") {
	                        mainmenu.find('ul').show();
	                    }
	                }
	            });
	            cssmenu.find('li ul').parent().addClass('has-sub');
	            var multiTg;
	            multiTg = function() {
	                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
	                cssmenu.find('.submenu-button').on('click', function() {
	                    $(this).toggleClass('submenu-opened');
	                    if ($(this).siblings('ul').hasClass('open')) {
	                        $(this).siblings('ul').removeClass('open').slideToggle();
	                    } else {
	                        $(this).siblings('ul').addClass('open').slideToggle();
	                    }
	                });
	            };
	            if (settings.format === 'multitoggle') multiTg();
	            else cssmenu.addClass('dropdown');
	            if (settings.sticky === true) cssmenu.css('position', 'fixed');
	            var resizeFix;
	            resizeFix = function() {
	                var mediasize = 1000;
	                if ($(window).width() > mediasize) {
	                    cssmenu.find('ul').show();
	                }
	                if ($(window).width() <= mediasize) {
	                    cssmenu.find('ul').hide().removeClass('open');
	                }
	            };
	            resizeFix();
	            return $(window).on('resize', resizeFix);
	        });
	    };
	})(jQuery);
	 $("#easy-menu").menumaker({
        format: "multitoggle"
    });

    /** =====================================
    *   Select 2
    * =====================================**/
    $('.hide-search--dropdown').select2({
        minimumResultsForSearch: -1
    });
    $('.selectpicker').select2();

    
    /** =====================================
    * Match Height active
    * =====================================***/
    $('.match-height > div').matchHeight();

    /*** =====================================
    * Preloder
    * ==================================== ***/
	$(window).on('load', function(){
	    $('.preloader').fadeOut(100);
	});
    /*** =====================================
    *   Fixed Menu
    * =====================================*/
    if($('.main-menu-area--absolute').length){
        var win = $(document);
        var menuTerget = $('.main-menu-area--absolute');
        var menuOffset = menuTerget.offset().top;
        win.on('scroll', function() {
         if (10 < win.scrollTop()) {
             menuTerget.addClass('main-menu-fix-active');
         } else {
             menuTerget.removeClass('main-menu-fix-active');
         }
        });
    }

    /** =====================================
    *  Back to top
    * ===================================== **/
    $(window).scroll(function(){
        if ($(this).scrollTop()>10) {
            $('#toTop').addClass('backtop-top-show');
        } else {
            $('#toTop').removeClass('backtop-top-show');
        }
    })
    $("#toTop").click(function (e) {
        e.preventDefault();
       $("html, body").animate({scrollTop: 0}, 1000);
    })
    /**=====================================
    *  carousel
    * =====================================*/
	var owlSlider = $('.owl');
	owlSlider.each( function() {
		var $carousel = $(this);
		$carousel.owlCarousel({
			nav :JSON.parse($carousel.attr('data-navigation')),
			dots: JSON.parse($carousel.attr('data-pagination')),
			autoplay: JSON.parse($carousel.attr('data-autoplay')),
            loop:true,
            margin:JSON.parse($carousel.attr('data-margin')),
            navText: [
        		"<i class='icon-icomoon-arrow-right'></i>",
        		"<i class='icon-icomoon-arrow-right'></i>"
        	],
            responsive:{
               0:{
                   items:$carousel.attr('data-itemsMobile'),
               },
               480:{
                   items:$carousel.attr('data-itemsTablet'),
               },
               768:{
                   items:$carousel.attr('data-itemsDesktopSmall'),
               },
               1200:{
                   items:$carousel.attr('data-itemsDesktop'),
               }
           }
		});
	});
    /*** =====================================
    * Progress
    * ==================================== ***/
    jQuery(window).on('scroll', function() {
        var windowHeight = $(window).height();
        function kalProgress() {
           var progress = $('.progress-rate');
           var len = progress.length;
           for (var i = 0; i < len; i++) {
               var progressId = '#' + progress[i].id;
               var dataValue = $(progressId).attr('data-value');
               $(progressId).css({'width':dataValue+'%'});
           }
        }
        var progressRateClass = $('#progress-running');
         if ((progressRateClass).length) {
             var progressOffset = $("#progress-running").offset().top - windowHeight;
             if ($(window).scrollTop() > progressOffset) {
                 kalProgress();
             }
         }
     });
    /** =====================================
    *  Wow JS
    * ===================================== **/
    if($('.wow').length){
        var wow=new WOW( {
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: -10, // distance to the element when triggering the animation (default is 0)
            mobile: false, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function(box) {}
            , scrollContainer: true // optional scroll container selector, otherwise use window
        }
        );
       wow.init();
    }


});
