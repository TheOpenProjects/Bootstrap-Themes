jQuery(function($) {
  "use strict";



  $(document).ready(function() {

    // resize image to parent
    $('.resize').resizeToParent();

    // animation for menu in header-2
    $('.nav_b').on('click', function() {
      var nav_line = $(".nav_b_line");
      nav_line.eq(0).toggleClass("nav_b_line_1");
      nav_line.eq(1).toggleClass("nav_b_line_2");
      nav_line.eq(2).toggleClass("nav_b_line_3");
      $('.nav_2').toggleClass('open');
      return false;
    });


    //add ellipsis to text
    $(".dot").dotdotdot({
      wrap: 'letter',
      watch: true,
    });

    //simulate hover on ios safari
    $('.grid-item, .team_area .team_item').on('click', function(e) {
      e.preventDefault();
      $(this).toggleClass('hover_effect');
    });


    // var frame = ".frame";
    var options = {
      slidee: '.slidee', // Selector, DOM element, or jQuery object with DOM element representing SLIDEE.
      horizontal: true, // Switch to horizontal mode.

      // Item based navigation
      itemNav: 'forceCentered', // Item navigation type. Can be: 'basic', 'centered', 'forceCentered'.]
      smart: true, // Repositions the activated item to help with further navigation.

      // Dragging
      dragSource: null, // Selector or DOM element for catching dragging events. Default is FRAME.
      mouseDragging: false, // Enable navigation by dragging the SLIDEE with mouse cursor.
      touchDragging: true, // Enable navigation by dragging the SLIDEE with touch events.
      releaseSwing: false, // Ease out on dragging swing release.
      swingSpeed: 0.6, // Swing synchronization speed, where: 1 = instant, 0 = infinite.
      elasticBounds: false, // Stretch SLIDEE position limits when dragging past FRAME boundaries.
      interactive: null, // Selector for special interactive elements.

      // scroll
      scrollBar: '.f_scroll', // Selector or DOM element for scrollbar container.
      scrollBy: 1,
      dragHandle: false, // Whether the scrollbar handle should be draggable.
      dynamicHandle: true, // Scrollbar handle represents the ratio between hidden and visible content.
      minHandleSize: 50, // Minimal height or width (depends on sly direction) of a handle in pixels.
      clickBar: true, // Enable navigation by clicking on scrollbar.
      syncSpeed: 0.5, // Handle => SLIDEE synchronization speed, where: 1 = instant, 0 = infinite.

      // Navigation buttons
      prev: '.f_prev', // Selector or DOM element for "previous item" button.
      next: '.f_next', // Selector or DOM element for "next item" button.

      // Automated cycling
      cycleBy: 'items', // Enable automatic cycling by 'items' or 'pages'.
      cycleInterval: 15000, // Delay between cycles in milliseconds.
      pauseOnHover: true, // Pause cycling when mouse hovers over the FRAME.
      startPaused: false, // Whether to start in paused sate.

      // Mixed options
      moveBy: 300, // Speed in pixels per second used by forward and backward buttons.
      // speed: 800, // Animations speed in milliseconds. 0 to disable animations.
      // easing: 'easeOutElastic', // Easing for duration based (tweening) animations.
      startAt: 0, // Starting offset in pixels or items.
      // keyboardNavBy: null, // Enable keyboard navigation by 'items' or 'pages'.

      // Classes
      draggedClass: 'dragged', // Class for dragged elements (like SLIDEE or scrollbar handle).
      activeClass: 'active', // Class for active items and pages.
      disabledClass: 'disabled' // Class for disabled navigation elements.
    };
    $('.frame').sly(options);

    var $grid = $('.grid').masonry({
      itemSelector: '.grid-item',
      // gutter: 10,
      horizontalOrder: false,
      percentPosition: true,
      // gutter: '.gutter-sizer'
    });

    // layout Masonry after each image loads
    $grid.imagesLoaded().progress(function() {
      $grid.masonry('layout');
    });

    $('.open-popup-link').magnificPopup({
      type: 'inline',
      // midClick: true,
      removalDelay: 300,
      mainClass: 'mfp-fade',
      gallery: {
        enabled: true, // set to true to enable gallery

        preload: [0, 2], // read about this option in next Lazy-loading section

        navigateByImgClick: true,

        arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

        tPrev: 'Previous (Left arrow key)', // title for left button
        tNext: 'Next (Right arrow key)', // title for right button
        tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
      }
    });


    jQuery('.portfolio_3 .slider').slippry({
      // slippryWrapper: '<div class="slider_wrap" />', // wrapper to wrap everything, including pager
      // options
      adaptiveHeight: false, // height of the sliders adapts to current slide
      useCSS: false, // true, false -> fallback to js if no browser support
      autoHover: false,
      transition: 'horizontal',
      auto: false,
      nextClass: 's_next pe-7s-angle-right',
      nextText: '',
      controlClass: 'slide_nav',
      prevClass: 's_prev  pe-7s-angle-left',
      prevText: ''
        // easing: 'easeInOutElastic'
    });



    // testimonials slider
    var test_list = $(".testimonials_area_2 ul");

    test_list.slippry({
      // options
      adaptiveHeight: false, // height of the sliders adapts to current slide
      useCSS: false, // true, false -> fallback to js if no browser support
      autoHover: false,
      transition: 'horizontal',
      auto: false,
      nextClass: 's_next pe-7s-angle-right',
      nextText: '',
      controlClass: 'slide_nav',
      prevClass: 's_prev  pe-7s-angle-left',
      prevText: ''
        // easing: 'easeInOutElastic'
    });

    // height for parent from highest children, testimonials 2
    var maxHeight = 0;

    test_list.find('li').each(function() {
      var thisH = $(this).height();
      if (thisH > maxHeight) {
        maxHeight = thisH;
      }
    });

    test_list.height(maxHeight + 40);



    // back to top
    var back = $(".back-to-top");
    if (back.length) {
      var scrollTrigger = 100, // px
        backToTop = function() {
          var scrollTop = $(window).scrollTop();
          if (scrollTop > scrollTrigger) {
            back.addClass('show');
          } else {
            back.removeClass('show');
          }
        };
      backToTop();
      $(window).on('scroll', function() {
        backToTop();
      });
      back.on('click', function(e) {
        e.preventDefault();
        $('html,body').animate({
          scrollTop: 0
        }, 700);
      });
    };

    AOS.init({
      offset: 30,
      duration: 400,
      easing: 'ease-in-out-sine',
      delay: 200,
    });

    $(function() {
      Grid.init();
    });

    // magnific popup and example for click after append
    $('.portfolio').magnificPopup({
      delegate: '.imgp',
      type: 'image',
      removalDelay: 300,
      mainClass: 'mfp-fade',
      gallery: {
        enabled: true, // set to true to enable gallery

        preload: [0, 2], // read about this option in next Lazy-loading section

        navigateByImgClick: true,

        arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

        tPrev: 'Previous (Left arrow key)', // title for left button
        tNext: 'Next (Right arrow key)', // title for right button
        tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
      }
    });

    $('.imgp').magnificPopup({
      type: 'image',
      removalDelay: 300,
      mainClass: 'mfp-fade',

      gallery: {
        enabled: true, // set to true to enable gallery

        preload: [0, 2], // read about this option in next Lazy-loading section

        navigateByImgClick: true,

        arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

        tPrev: 'Previous (Left arrow key)', // title for left button
        tNext: 'Next (Right arrow key)', // title for right button
        tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
      }

    });

    //add class focus is input focused and keyup
    $(".in").focus(function() {
      $(this).parent().addClass("focus");
    }).blur(function() {
      if ($(this).val() === '') {
        $(this).parent().removeClass("focus");
      }
    })


    // scroll menu hover effect
    // Cache selectors
    var lastId,
      topMenu = $("nav ul li"),
      topMenuHeight = topMenu.outerHeight() + 15,
      // All list items
      menuItems = topMenu.find("a"),
      // Anchors corresponding to menu items
      scrollItems = menuItems.map(function() {
        var item = $($(this).attr("href"));
        if (item.length) {
          return item;
        }
      });

    // Bind click handler to menu items
    // so we can get a fancy scroll animation
    menuItems.click(function(e) {
      var href = $(this).attr("href"),
        offsetTop = href === "#" ? 0 : $(href).offset().top -
        topMenuHeight + 1;
      $('html, body').stop().animate({
        scrollTop: offsetTop
      }, 300);
      e.preventDefault();
    });

    // Bind to scroll
    $(window).scroll(function() {
      // Get container scroll position
      var fromTop = $(this).scrollTop() + topMenuHeight;

      // Get id of current scroll item
      var cur = scrollItems.map(function() {
        if ($(this).offset().top < fromTop)
          return this;
      });
      // Get the id of the current element
      cur = cur[cur.length - 1];
      var id = cur && cur.length ? cur[0].id : "";

      if (lastId !== id) {
        lastId = id;
        // Set/remove active class
        menuItems
          .parent().removeClass("active")
          .end().filter("[href='#" + id + "']").parent().addClass(
            "active");
      }
    });


  });

  // delete loader after load page
  $(window).load(function() {
    setTimeout(function() {
      $(".loader_area").delay(100).fadeOut().remove();
      $("body").delay(100).removeClass("ovhide");
    }, 1200);
  });

  // add header class fixed on scroll
  $(window).scroll(function() {
    var header = $("header");
    var scroll = $(window).scrollTop();
    if (scroll > 300) {
      header.addClass("fixed");
    } else {
      header.removeClass("fixed");
    }
  });

});
