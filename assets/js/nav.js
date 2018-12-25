$(document).ready(function(){
	$('#tes').click(function(){
			$('#bawah-nav').slideToggle('slow', function(){
			$('.icon').toggle();
		});
	});
}); 

//QUERY UNTUK BACKGROUND HEADER SAAT DI SCROLL
$(window).scroll(function(){
 		if($(window).scrollTop() >= 100){
 			$('#contain').removeClass('contain');
 			$('#nav').removeClass('nav-tinggi');
 			$('#bawah-nav').css('margin-top', '-0px');
 			$('.icon').removeClass('.icon');
 		}else{
 			$('#contain').addClass('contain');
 			$('#nav').addClass('nav-tinggi');
 		}
 	});

