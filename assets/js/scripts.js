jQuery(document).ready(function($) {

	// function for swiper slider (on homepage) to run
	// checks if Swiper function is available before executing
	if (typeof $.fn.Swiper == 'function') {  
	    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 0,
        loop: true
    	});
    }

	// Back to top 
    var offset = 220;
    var duration = 500;

    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });
    
    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});  
