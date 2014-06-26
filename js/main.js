(function(){
	var menu_slide = $('.tab p'),
	    menu_a =$('.tab a');

	        
	menu_slide.hide();
	    
	menu_a.click(function(){
		$(this).next('p').slideToggle();
	    $(this).parent().siblings().children('p').slideUp();
		$('.tab').addClass('.tab-open');
	    });
})();	