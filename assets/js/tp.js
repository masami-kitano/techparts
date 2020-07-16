(function(){
    if(!window.jQuery) return;
    var $ = window.jQuery.noConflict();

    function toggleNav() {
        var body_area = $('body');
        var hamburger = $('#hamburger');
        var blackBg = $('#black-bg');
        
        hamburger.on('click', function() {
            body_area.toggleClass('nav-open');
        });
        
        blackBg.on('click', function() {
            body_area.removeClass('nav-open');
        });
    }
    toggleNav(); 

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
})();