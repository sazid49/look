// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);
var Wh = window.innerHeight;

//main padding top when header having fixed positions
var header = $('header');
headerHeight = header.innerHeight();
var main = $('main');
main.css('padding-top', headerHeight);

// Preloader
$(window).on('load', function () {
  $('#preloader')
    .delay(1000)
    .fadeOut('slow', function () {
      $(this).remove();
    });
});

// sticky header start

$(window).scroll(function () {
  var sticky = $('header'),
    scroll = $(window).scrollTop();

  if (scroll >= 60) {
    sticky.addClass('sticky-header');
  }
  else {
    sticky.removeClass('sticky-header');

  }
});

// sticky header end

//select2 dorpdown js start
$(document).ready(function () {
  $('.js-select-single').select2({
    dropdownCssClass: 'no-search',
    width: '100%'
  });
  $('.js-select-multiple').select2();
  $('.js-select-category').select2({
    placeholder: "Select Category",
    dropdownCssClass: 'no-search',
    width: '100%'
  });
});

//select2 dorpdown js end

$('input[name="date"]').datepicker({
  'format': 'yyyy-m-d',
  'autoclose': true
});
$('input[name="date-from"]').datepicker({
  'format': 'yyyy-m-d',
  'autoclose': true
});
$('input[name="date-to"]').datepicker({
  'format': 'yyyy-m-d',
  'autoclose': true
});
// timepicker start
$('.timepick').timepicker({
  width: '100%'
});
// timepicker end

// password toogle icon js start
$(".toggle-password").click(function () {
  $(this).toggleClass("img-eye img-eye-slash");
  var pw = $('#loggedpassword');
  if (pw.attr("type") == "password") {
    pw.attr("type", "text");
  } else {
    pw.attr("type", "password");
  }
});
// password toogle icon js end


// if < then 768
// mobile sorting overlay jquery start
const mediaQuerymobile = window.matchMedia('(max-width: 768.98px)')

if (mediaQuerymobile.matches) {
  $('.sort-drop').on('show.bs.dropdown', function () {
    $('.overlay').fadeIn();
  });
  $('.sort-drop').on('hide.bs.dropdown', function () {
    $('.overlay').fadeOut();
  });

  $('.advance-btn').click(function () {
    $('body').addClass('overflow-hidden vh-100');
  });
  $('.advanceSearchCollapse').on('show.bs.collapse', function () {
    $('header').addClass('opend-categoryfillter');
  });
  $('.advanceSearchCollapse').on('hider.bs.collapse', function () {
    $('header').removeClass('opend-categoryfillter');
  });
  $('.advance-close-btn').click(function () {
    $('.advanceSearchCollapse').collapse('hide');
    $('body').removeClass('overflow-hidden vh-100');
    $('header').removeClass('opend-categoryfillter');
  });


  // mobile filter jquery start

  $('.filter-btn').click(function () {
    $('.sidebar').addClass('open');
    $('header').addClass('opend-categoryfillter');
    $('body').addClass('overflow-hidden vh-100');
  });
  $('.filter-close-btn').click(function () {
    $('.sidebar').removeClass('open');
    $('body').removeClass('overflow-hidden vh-100');
    $('header').removeClass('opend-categoryfillter');
  });
  // mobile filter jquery end
}

//slideshow jquery

class Slideshow {

  constructor() {
    this.initSlides();
    this.initSlideshow();
  }

  // Set a `data-slide` index on each slide for easier slide control.
  initSlides() {
    this.container = $('[data-slideshow]');
    this.slides = this.container.find('img');
    this.slides.each((idx, slide) => $(slide).attr('data-slide', idx));
  }

  // Pseudo-preload images so the slideshow doesn't start before all the images
  // are available.
  initSlideshow() {
    this.imagesLoaded = 0;
    this.currentIndex = 0;
    this.setNextSlide();
    this.slides.each((idx, slide) => {
      $('<img>').on('load', $.proxy(this.loadImage, this)).attr('src', $(slide).attr('src'));
    });
  }

  // When one image has loaded, check to see if all images have loaded, and if
  // so, start the slideshow.
  loadImage() {
    this.imagesLoaded++;
    if (this.imagesLoaded >= this.slides.length) { this.playSlideshow() }
  }

  // Start the slideshow.
  playSlideshow() {
    this.slideshow = window.setInterval(() => { this.performSlide() }, 3500);
  }

  // 1. Previous slide is unset.
  // 2. What was the next slide becomes the previous slide.
  // 3. New index and appropriate next slide are set.
  // 4. Fade out action.
  performSlide() {
    if (this.prevSlide) { this.prevSlide.removeClass('prev fade-out') }

    this.nextSlide.removeClass('next');
    this.prevSlide = this.nextSlide;
    this.prevSlide.addClass('prev');

    this.currentIndex++;
    if (this.currentIndex >= this.slides.length) { this.currentIndex = 0 }

    this.setNextSlide();

    this.prevSlide.addClass('fade-out');
  }

  setNextSlide() {
    this.nextSlide = this.container.find(`[data-slide="${this.currentIndex}"]`).first();
    this.nextSlide.addClass('next');
  }

}

$(document).ready(function () {
  new Slideshow;
});



// slick carousel start
//setTimeout(function(){ 
$('.multiple_slick').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  infinite: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: "unslick"
    },
    {
      breakpoint: 480,
      settings: "unslick"
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
  prevArrow: "<button type='button' class='slick-prev pull-left'><svg class='icon-18'><use xlink:href='#ic_left'></use></svg></button>",
  nextArrow: "<button type='button' class='slick-next pull-right'><svg class='icon-18'><use xlink:href='#ic_right'></use></svg></button>"
});
$('.job_slick, .testimonial_slick').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  infinite: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: "unslick"
    },
    {
      breakpoint: 480,
      settings: "unslick"
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
  prevArrow: "<button type='button' class='slick-prev pull-left'><svg class='icon-18'><use xlink:href='#ic_left'></use></svg></button>",
  nextArrow: "<button type='button' class='slick-next pull-right'><svg class='icon-18'><use xlink:href='#ic_right'></use></svg></button>"
});

//}, 1000);
// slick carousel end
$('.ts-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  infinite: true,

  // You can unslick at a given breakpoint now by adding:
  // settings: "unslick"
  // instead of a settings object

  prevArrow: "<button type='button' class='slick-prev pull-left'><svg class='icon-18'><use xlink:href='#ic_left'></use></svg></button>",
  nextArrow: "<button type='button' class='slick-next pull-right'><svg class='icon-18'><use xlink:href='#ic_right'></use></svg></button>"
});

// gallery slick slider
$('.slider-single').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  autoplay: true,
  adaptiveHeight: true,
  infinite: false,
  useTransform: true,
  speed: 400,
  cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
});

$('.slider-nav')
  .on('init', function (event, slick) {
    $('.slider-nav .slick-slide.slick-current').addClass('is-active');
  })
  .slick({
    slidesToShow: 7,
    slidesToScroll: 7,
    dots: false,
    focusOnSelect: false,
    infinite: false,
    arrows: true,
    autoplay: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><svg class='icon-18'><use xlink:href='#ic_left'></use></svg></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><svg class='icon-18'><use xlink:href='#ic_right'></use></svg></button>",
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 5,
      }
    }, {
      breakpoint: 640,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      }
    }, {
      breakpoint: 420,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    }]
  });

$('.slider-single').on('afterChange', function (event, slick, currentSlide) {
  $('.slider-nav').slick('slickGoTo', currentSlide);
  var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
  $('.slider-nav .slick-slide.is-active').removeClass('is-active');
  $(currrentNavSlideElem).addClass('is-active');
});

$('.slider-nav').on('click', '.slick-slide', function (event) {
  event.preventDefault();
  var goToSingleSlide = $(this).data('slick-index');

  $('.slider-single').slick('slickGoTo', goToSingleSlide);
});
//gallery slick slider end

$(".isprivate").each(function () {
  $(this).on('click', function () {
    var sib = $(this).siblings('.notprivateperson');
    console.log(sib);
    sib.fadeToggle();
  }
  )
})
// tooltip enable
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


/*----------------------------------------------------*/
/*  Rating Overview Background Colors
/*----------------------------------------------------*/
function ratingOverview(ratingElem) {

  $(ratingElem).each(function () {
    var dataRating = $(this).attr('data-rating');

    // Rules
    if (dataRating >= 4.0) {
      $(this).addClass('high');
      $(this).find('.rating-bars-rating-inner').css({ width: (dataRating / 5) * 100 + "%", });
    } else if (dataRating >= 3.0) {
      $(this).addClass('mid');
      $(this).find('.rating-bars-rating-inner').css({ width: (dataRating / 5) * 80 + "%", });
    } else if (dataRating < 3.0) {
      $(this).addClass('low');
      $(this).find('.rating-bars-rating-inner').css({ width: (dataRating / 5) * 60 + "%", });
    }

  });
} ratingOverview('.rating-bars-rating');

$(window).on('resize', function () {
  ratingOverview('.rating-bars-rating');
});

// fancybox
$('.lookon-item').fancybox({
  parentEl: '.lookon-gallery',
  buttons: [
    "close"
  ],
  loop: false,
  protect: true,

});

$('.user-item').fancybox({
  buttons: [
    "close"
  ],
  loop: false,
  protect: true,
  parentEl: '.user-gallery'
});

$('.review-img').fancybox({
  buttons: [
    "close"
  ],
  loop: false,
  protect: true,
  parentEl: '.review-uploaded-image'
});
