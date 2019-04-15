    $(window).scroll(function(){

        // =========Stiky Navbar ===================
        if ($(this).scrollTop() > 10){
            $('.main-navbar').addClass('fixed-header');
            // $('.brand-logo').addClass('small-logo');
        }else{
            $('.main-navbar').removeClass('fixed-header');
            // $('.brand-logo').removeClass('small-logo');

            // $('.search-wrapper').addClass('hide');
            // $('.search-btn').removeClass('hide');
            // $('.search-btn-close').addClass('hide');
        }

    });
    

    jQuery(document).ready(function( $ ) {

      // =============Stiky Navbar=============================
      if ($(document).scrollTop() > 170){
          $('.nav-search-header').addClass('fixed-header');
        }else{
          $('.nav-search-header').removeClass('fixed-header');
      }

      // ================SelectPicker Init=====================
      $('.selectpicker').selectpicker();

      // ====================DatePicker Init ==================
      $('.input-daterange').datepicker({});
    


      // =============Tooltip Init=================
          $('[data-toggle="tooltip"]').tooltip();

      // ==============Flexslider Init=============
            $('.flexslider').flexslider({
              animation: "fade",
              slideshowSpeed : 5000,
              controlNav : false
            });

            $('.featured-photos').flexslider({
              animation: "fade",
              slideshowSpeed : 5000,
              directionNav : true,
              controlNav : false,
              customDirectionNav: $(".featured-photos-nav a")
            });

           $('.featured-photos-nav a').click(function(e) {
                 return false; 
                 e.preventDefault();
            });

           $('.coming-soon-slider').flexslider({
              animation: "fade",
              slideshowSpeed : 5000,
              directionNav : false,
              controlNav : false
            });
          
        
        // ===========Owl Carousel============
        if ($("#testi-slides").length > 0) {
            $("#testi-slides").owlCarousel({
                items: 1,
                lazyLoad: true,
                pagination: true,
                autoPlay: 5000,
                stopOnHover: true
            });
        }

        if ($(".partner-slides").length > 0) {
            $(".partner-slides").owlCarousel({
                items: 5,
                lazyLoad: true,
                pagination: false,
                autoPlay: 3000,
                stopOnHover: true,
                navigation : false
            });
        }


        if ($(".other-room-slider").length > 0) {
            $(".other-room-slider").owlCarousel({
                items: 3,
                lazyLoad: true,
                pagination: true,
                autoPlay: 5000,
                stopOnHover: true
            });
        }

        if ($(".teams-slider").length > 0) {
            $(".teams-slider").owlCarousel({
                items: 4,
                lazyLoad: true,
                pagination: true,
                autoPlay: 5000,
                stopOnHover: true
            });
        }

        if ($(".other-photos").length > 0) {
            $(".other-photos").owlCarousel({
                items: 3,
                lazyLoad: true,
                pagination: true,
                autoPlay: 5000,
                stopOnHover: true
            });
        }

        // =========BX Slider===========
        if ($(".bxslider" ).length > 0 ) {
          $('.bxslider').bxSlider({
            pagerCustom: '#bx-pager'
          });
        }



      // =============PretyPhoto Init =================
      if($('a[data-gal]').length > 0){
        $("a[data-gal^='prettyPhoto']").prettyPhoto({animation_speed:'normal',social_tools:'',theme:'light_square'});
      }
      
      //=========Init CountDown==========//
      if($('.countdown').length > 0){
        $('.countdown').downCount({
            date: '09/18/2017 08:00:00' // m/d/y
        });
      }

      $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
            $('#toTop').fadeIn();
          } else {
            $('#toTop').fadeOut();
          }
      });

      // scroll body to 0px on click
      $('#toTop').click(function () {
          $('body,html').animate({
            scrollTop: 0
          }, 800);
          return false;
      });

    });


 function initialize() {
        var myLatlng = new google.maps.LatLng(-7.781736, 110.368322); // Change your location
        var mapOptions = {
          zoom: 13, // Change zoom value
          scrollwheel: false, // Change to "true" to enable users scale map on scroll
          center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Your business is here!' // Change the pinpoint popup text
        });
      }

if($('#map-canvas').length > 0){
  google.maps.event.addDomListener(window, 'load', initialize);
}

// ==============GoogleAnalytics Tracker==============
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68909522-1', 'auto');
  ga('send', 'pageview');
