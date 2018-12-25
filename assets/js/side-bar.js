

$(document).ready(function(){
	if($(document).width() <= 768) // JIKA LAYAR CLIENT DIBAWAH 768
	{
		$("#negara").hide();
		$("#negara-responsive").show();
	}else{
		$("#negara").show();
	}
});

$(window).resize(function(){
	if ($(window).width() <= 768)
	{
		$("#negara").hide();
		$("#negara-responsive").show();
	}else{
		$("#negara").show();
		$("#negara-responsive").hide();
	}
});

