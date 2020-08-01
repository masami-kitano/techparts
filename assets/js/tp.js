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

    function pageTop() {
		var topBtn = $('#page-top');
		topBtn.hide();
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				topBtn.fadeIn();
			} else {
				topBtn.fadeOut();
			}
		});
		topBtn.click(function() {
		  $('body,html').animate({
			scrollTop: 0
		  }, 500);
		  return false;
		});
    }
    pageTop();

    $(document).ready(function()  {
        $('.topics__wrap').fadeIn();
    });

    function ankerScroll() {
		$('a[href^="#"]').click(function(){
			var speed = 300;
			var href= $(this).attr("href");

			if($(href).parent().css('display') == 'none') {
				$(href).parent().css('display', 'block');
			}
 
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top;
			$("html, body").animate({scrollTop:position}, speed, "swing");
			return false;
        });
    }
    ankerScroll();

    // slick slider
    $('.slick').slick({
        slidesToShow: 3,
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