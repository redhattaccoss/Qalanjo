/**
 * Login Script
 */

$(document).ready(function(){
	$(".buttonsignup").click(function(e){
		window.location.href = qalanjo_url+"";
		e.preventDefault();
	});
	$("h3.required").css("border-bottom", "none");
	if (error==1){
		$(".error-block").animate({
			marginTop:"0px"
		}, 300);
	}
	$(".close-error").click(function(e){
		$(".error-block").animate({
			marginTop:"-120px"
		}, 300);
		e.preventDefault();
	})
	
});