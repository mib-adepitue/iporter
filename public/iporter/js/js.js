$('.carousel').carousel({
    interval: 2000
});

$(window).scroll(function () {
	var scroll = $(window).scrollTop();

	if(scroll >= 100){
		$(".navbar").addClass("navbar-scroll");
	}
	else{
		$(".navbar").removeClass("navbar-scroll");
	}
});