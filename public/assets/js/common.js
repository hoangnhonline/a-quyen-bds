/*
 * ---------------------------------------------------
 * 1. Slide Carousel
 * 2. Scroll to Top
 * 3. Sticky Menu
 * 4. Accordion has icon
 * 5. Hover tag a show ul page Product
 * 6. POPUP order a product - check on info Payment
 * 7. Scroll News Item Tablet & Mobile
 */

  (function($){
    "use strict";
  /* ==================================================== */

  /*
   * 1. Slide Carousel
  */
  $(document).ready(function() {
    $('.owl-carousel').each(function(index, el) {
      var config = $(this).data();
      config.navText = ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'];
      config.smartSpeed="800";
      
      if($(this).hasClass('owl-style2')){
        config.animateOut='fadeOut';
        config.animateIn='fadeIn';    
      }
      if($(this).hasClass('dotsData')){
        config.dotsData="true";
      }
      $(this).owlCarousel(config);
    });
  });

  /*
   * 2. Scroll to Top
  */
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 200) {
      $('#return-to-top').addClass('td-scroll-up-visible');
    } else {
      $('#return-to-top').removeClass('td-scroll-up-visible');
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 'slow');
  });

  /*
   * 3. Sticky Menu
  */
  $('.header-mobile-sticky').sticky({
    topSpacing: 0,
    responsiveWidth: true,
    wrapperClassName: 'hidedesktop',
  });

  /*
   * 3. Show Right Sidebar
  */
  $('.Sidebar_Tab').on('click', function() {
    $(this).addClass('active');
    $('body').addClass('Rightsidebar');
    $('#showSidebar_Tab').addClass('active');
  })

  

  $(document).on('click','.block-rightSidebar .block-title .iconClose, .sidebar-overlay', function() {
    $('showRightsidebar').removeClass('active');
    $('body').removeClass('Rightsidebar');
    $('.block-rightSidebar').removeClass('active');
  })

  /** Menu, Menu Mega Responsive **/
  $(document).ready(function(){
    $('#nav li a').click(function(){
      $(this).parent().removeClass('open');
      $(this).parent().toggleClass('open').siblings('.submenu').slideToggle();      
    });
  });

  $('.show-more').on('click', function() {
    $(this).parent().addClass('all');
  })

  function toggleIcon(e) {
    $(e.target)
      .prev('.panel-heading')
      .find(".more-less")
      .toggleClass('fa-caret-right fa-caret-down');
  }
  $('.panel-group').on('hidden.bs.collapse', toggleIcon);
  $('.panel-group').on('shown.bs.collapse', toggleIcon);

  /*  [ Main Menu ]
  - - - - - - - - - - - - - - - - - - - - */
  $(".header-mobile .show-menu").on( 'click', function() {
    $(this).toggleClass('has-open');
    $('.header .header-sidebar').toggleClass("has-open");
    $('body').toggleClass("sidebar-open");
  });
  $(".header-sidebar .iconClose-sidebar").on( 'click', function() {
    $('.header-mobile .show-menu').removeClass('has-open');
    $(".header .header-sidebar").removeClass("has-open");
    $("body").removeClass("sidebar-open");
  });

  var resizeHeight = $(window).height();
  $('.home .fullscreen-container').css({"height": resizeHeight, "overflow": "visible"});
  $('.home .owl-carousel .owl-item').css({"height": resizeHeight, "width": "auto"});

  $(window).resize(function(event) {
    var resizeHeight = $(window).height();
    $('.home .fullscreen-container').css({"height": resizeHeight, "overflow": "visible"});
    $('.home .owl-carousel .owl-item').css({"height": resizeHeight, "width": "auto"});
  });

  $('.block-menumb-fixed .block-title').on('click', function() {
    $(this).toggleClass('open');
    $(this).parent().find('ul').toggleClass('active');
    // if ($('.block-menumb-fixed ul').hasClass('active')) {
    //   $(window).click(function() {
    //     $('.block-menumb-fixed ul').removeClass('active');
    //   })
    // }
  });

})(jQuery); // End of use strict

// Function get size image set for 
var Simg = 0;
function widthImg() {
  Simg = $('.product-img-box__mobile .item img').width(); 
  $('.product-img-box__mobile').css({'width': Simg});
}
widthImg();
$(window).resize(function() {
  $('.product-img-box__mobile').css({'width': ''});
  widthImg();  
});
 $(document).on('click', '#btnMore', function(){  
      var url = $('ul.pagination li.active').next().find('a').attr('href');
      location.href=url;
  });