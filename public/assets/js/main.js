"use strict";
(function ($) {
  "use strict";
  $(document).ready(function () {


  });

})(jQuery);
 //Sticky Navbar
 window.addEventListener("scroll", () => {
  let headerWrapper = document.querySelector(".header_wrapper");
  headerWrapper.classList.toggle("navbar-fixed", scrollY > 0);
});
  // Mobile Menu
  let navbarIcon = document.querySelector("#mobile_navbar_icon");
  let navbarCloseIcon = document.querySelector(".close_icon");
  let navbarOverlay = document.querySelector(".mobile_menu_overlay");
  let mobileMenuArea = document.querySelector(".mobile_menu_area");
  navbarIcon.addEventListener("click",()=>{
    console.log("hello");
    mobileMenuArea.classList.add("navbar_active")
  })
  navbarCloseIcon.addEventListener("click",()=>{
    hideNavbar();
  })
  navbarOverlay.addEventListener("click",()=>{
    hideNavbar();
  })
  function  hideNavbar(){
    mobileMenuArea.classList.remove("navbar_active");
  }


//Event Slider
let swiperEvent = new Swiper('.event_slider_area .swiper', {
  // Default parameters
  slidesPerView: 1,
  spaceBetween: 10,
  speed:1100,
  keyboard: {
    enabled: true,
    onlyInViewport: true,
  },
  autoplay: {
    delay: 5000,
  },
  // Responsive breakpoints
  breakpoints: {

    // when window width is >= 480px
    576: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 3,
      spaceBetween: 20
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 50
    },
  },

  navigation: {
    nextEl: '.event_next_icon',
    prevEl: '.event_prev_icon',
  },
});

//Facilities Slider
let swiperFacilities = new Swiper('.facilitites_slier_area .swiper', {
  // Default parameters
  slidesPerView: 1,
  spaceBetween: 10,
  speed:1100,
  keyboard: {
    enabled: true,
    onlyInViewport: true,
  },
  autoplay: {
    delay: 5000,
  },
  // Responsive breakpoints
  breakpoints: {

    // when window width is >= 480px
    576: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 3,
      spaceBetween: 20
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 35
    },
  },
  navigation: {
    nextEl: '.facilities_next_icon',
    prevEl: '.facilities_prev_icon',
  },
});


//Counter
let visibilityIds = ['#counters_1', '#counters_2', '#counters_3 ','#counters_4 ' ];
// default counter class
let counterClass = '.counter';
// default animation speed
let defaultSpeed = 3000;

// AOS On Page Scroll JS
$(function () {
  AOS.init({
    duration: 1000,
    offest: 150,
  });
});
$(window).on("load", function () {
  AOS.refresh();
});