$(function(){
    $(document).ready(function()  {
        $('.topics__wrap').fadeIn();
    });

    // slick slider
    $('.slick').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [{
            breakpoint: 599,
            settings: { 
              slidesToShow: 1,
            }
          }]
        });
    });