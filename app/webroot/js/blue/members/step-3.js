/**
 * Step 3
 */

function showDialog(){
	var height = $("body").scrollTop(0).css("overflow-y", "hidden").css("height").split("p");
	var width = $("body").css("width").split("p");
	var objHeight = $(".container-dialog").css("height").split("p");
	var objWidth = $(".container-dialog").css("height").split("p");
	$(".container-dialog").css("left", ((width[0]/2)-objWidth[0])+"px").css("top", ((height[0]/2)-objHeight[0])+"px").fadeIn();
	$("#overlay").fadeIn();
}

function configureDialog(){
	$(".buttonclose").click(function(e){
		closeDialog();
		e.preventDefault();
	});
	$(".buttontest").click(function(e){
		closeDialog();
		window.location.href = qalanjo_url+"profile_completion";
		e.preventDefault();
	});
	$(".skipthis").click(function(e){
		closeDialog();
		window.location.href = qalanjo_url+"welcome";
		e.preventDefault();
	});
}

function closeDialog(){
	$("body").scrollTop(0).css("overflow-y", "visible");
	$(".container-dialog").fadeOut();
	$("#overlay").fadeOut();
}
