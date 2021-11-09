(function ($) {

	$(document).ready(function() {

    $(".header-hamb").click(function() {
      $(this).toggleClass("open");
      $(".header").toggleClass("open");
      $(".mobile-header").toggleClass("open");
    });

    $('.homepage-work-slider-inner').slick({
      autoplay: true,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      arrows: false,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1
          }
        },
      ]
    });


  });

}(jQuery));
