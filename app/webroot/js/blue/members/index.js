/**
 * Script for members index
 * @version 0.0.1
 * @date 5/21/2011
 */




/**
 * Autocomplete for member search
 */
function autocomplete_member(){
	$("#member_search").autocomplete({
		source:qalanjo_url+'members/autocomplete_member',
		minlength:2,
		select:function(event, ui){
			var items = ui.item.value.split(";");
			ui.item.value = items[0];
			$("#PrivateMessageToId").val(items[1]);			
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function(event, ui) {
			$( this ).removeClass( "ui-corner-top" );
					
		}
	}).data( "autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>"+ item.label + "</a>" )
            .appendTo( ul );
    };;
}
/*
 * Load Matches
 */
function load_matches(){
	$("#matches_loader").load(qalanjo_url+"matches/daily_matches");
}

function count_matches(){
	$.ajax({
		url:qalanjo_url+"matches/loadMatchCount",
		success:function(data){
			var result = "";
			var count = "(0)";
			if (parseInt(data)>"1"){
				result = data+" new matches";
			}else if (parseInt(data)==1){
				result = "1 new match";
			}else{
				result = "0 new match";
			}
			$("#match_count").text(result);
			if (isNaN(data)){
				count = "("+parseInt(data)+")";	
			}
			$("#activity-communication-count").text(count);
		}
	});
}


function count_item(url, target){
	$.ajax({
		url:url,
		success:function(data){
			$(target).text("("+data+")");
		}
	});
}

function view_all_communications(){
	$("#view_all_communications_link").live("click", function(e){
		communications();
		e.preventDefault();
	});
}

function view_all_sent_gifts(){
	
	$("#view_all_sent_gifts_link").live("click", function(e){
		sent_gifts();
		e.preventDefault();
	});
}

function sent_gifts(){
	allSlidesUp();
	$.ajax({
		url:qalanjo_url+"gifts/load_sent_gifts/100",
		success:function(data){
			$("#gift_accordion_item").html(data).hide().slideDown(500);
		}
	});
}

function communications(){
	allSlidesUp();
	$.ajax({
		url:qalanjo_url+"members/loadCommunications/100",
		success:function(data){
			$("#communication_accordion_item").html(data).hide().slideDown(500);
		}
	});
}


function wvme(){
	allSlidesUp();
	$.ajax({
		url:qalanjo_url+"view_activities/loadCommunications/100",
		success:function(data){
			$("#whoviewed_accordion_item").html(data).hide().slideDown(500);
		}
	});
}
function view_all_wvme(){
	$("#view_me_link").live("click", function(e){
		wvme();
		e.preventDefault();
	});
}
function checkstatus(data) {
    console.log(data); // To see output using Firebug
    if (data.s == 'available') {
        alert('User is online');
    }
}

function allSlidesUp(){
	$("#whoviewed_accordion_item").slideUp(500);
	$("#communication_accordion_item").slideUp(500);
	$("#gift_accordion_item").slideUp(500);
	$("#photo_accordion_item").slideUp(500);
	$("#profile_accordion_item").slideUp(500);
}

var validator;
function activateShoutbox(){
	$("#shoutbox-result").hide();
	var options = {
			target:"#shoutbox-result",
			success:showShoutResponse
	};

	validator = $("#shoutbox").validate({
		errorElement: "em",
		errorPlacement: function(error, element) {
			$(".shout_required").html("");
			error.removeClass("error").addClass("error_label").appendTo(".shout_required");
		},
		success: function(label) {
			label.text("");
			if (validator.numberOfInvalids()==0){
			
			}
		},
		submitHandler:function(form){
			$(form).ajaxSubmit(options);
		},
		rules: {
			"data[MemberProfile][status]": {
				minlength:3,
				maxlength:450,
				required:true
			}
		},
		messages:{
			"data[MemberProfile][status]": {
				minlength:"Post is too short",
				maxlength:"Post is too long",
				required:"A message is required"
			}
		}
	});
}

function showShoutResponse(responseText, statusText, xhr, $form)  { 
	$("#shoutbox-result").dialog({
		modal:true,
		height:200,
		width:450,
		buttons:{
			Ok:function(){
				$(this).dialog("close");
			}
		},
		title:"Status"
	});
	$("#shouter").val("");
}

var buttonState = "group-view";
$(document).ready(function(){
	interval = setInterval("updateStatus()", 1000, "javaScript");
	count_matches();
	$("#wink").hide();
	$("#gift-box").hide();
	view_all_communications();
	view_all_wvme();
	view_all_sent_gifts();
	activateShoutbox();
	count_item(qalanjo_url+"view_activities/countViewActivities", "#activity-wvme-count");
	count_item(qalanjo_url+"members/countCommunications", "#activity-communication-count");
	$.ajax({
		url:qalanjo_url+"members/loadCommunications",
		success:function(data){
			$("#communication_accordion_item").html(data).hide().slideDown(500);
		}
	});
	$.ajax({
		url:qalanjo_url+"view_activities/loadCommunications",
		success:function(data){
			$("#whoviewed_accordion_item").html(data).hide().slideDown(500);
		}
	});
	$.ajax({
		url:qalanjo_url+"gifts/load_sent_gifts",
		success:function(data){
			$("#gift_accordion_item").html(data).hide().slideDown(500);
		}
	});
	$.ajax({
		url:qalanjo_url+"photo_updates/loadUpdates",
		success:function(data){
			$("#photo_accordion_item").html(data).hide().slideDown(500);
		}
	});
	
	$(".header-button").click(function(e){
		$(".header-button").removeClass("active");
		$(this).addClass("active");
		var id = $(this).attr("id");
		if (id=="activity-who-viewed-me-button"){
			wvme();	
		}else if (id=="activity-communication-button"){
			communications();
		}else if (id=="activity-gift-button"){
			sent_gifts();
		}
		e.preventDefault();
	});
	
	$("#activity-list-button").click(function(e){
		if (buttonState=="group-view"){
			$("#match-content").show();
			$("#activity-content").hide();
		}
		buttonState = "list-view";
		$.get(qalanjo_url+"matches/daily_matches", function(data){
			$("#match-list").html(data);
		});
		e.preventDefault();
	});
	
	$("#activity-group-button").click(function(e){
		if (buttonState=="list-view"){
			$("#match-content").hide();
			$("#activity-content").show();
		}
		buttonState = "group-view";
		allSlidesUp();
		count_item(qalanjo_url+"view_activities/countViewActivities", "#activity-wvme-count");
		count_item(qalanjo_url+"members/countCommunications", "#activity-communication-count");
		$.ajax({
			url:qalanjo_url+"members/loadCommunications",
			success:function(data){
				$("#communication_accordion_item").html(data).hide().slideDown(500);
			}
		});
		$.ajax({
			url:qalanjo_url+"view_activities/loadCommunications",
			success:function(data){
				$("#whoviewed_accordion_item").html(data).hide().slideDown(500);
			}
		});
		$.ajax({
			url:qalanjo_url+"gifts/load_sent_gifts",
			success:function(data){
				$("#gift_accordion_item").html(data).hide().slideDown(500);
			}
		});
		
		$.ajax({
			url:qalanjo_url+"photo_updates/loadUpdates",
			success:function(data){
				$("#photo_accordion_item").html(data).hide().slideDown(500);
			}
		});
		
		e.preventDefault();
	});
	$("#match-content").hide();
	$(".winker").live("click", function(e){
		var temp = $(this).attr("id");
		var id = temp.split("_");
		$.ajax({
			url:qalanjo_url+"members/getMemberJSON/"+id[1],
			success:function(data){
				var temp = $.parseJSON(data);
				$("#wink_name").text(temp.Member.firstname);
				askAndWink(id[1]);
			}
		});		
		e.preventDefault();
	});
	
	$(".gifter").live("click", function(e){
		var id = $(this).attr("id").split("_");
		$("#gift-box").html("<div class='spinner'></div>");
		$("#gift-box").dialog({
			modal:true, height:491, width:487, resizable:false,
			title:"Your gift", show:"fade", hide:"fade",
			buttons:{
				Ok:function(){
					$(this).dialog("close");
				}
			}
		});
		$.get(qalanjo_url+"gifts/open/"+id[1], function(data){
			$("#gift-box").html("");
			$(data).appendTo("#gift-box").hide().fadeIn();
		});
		e.preventDefault();
	});
	
	$("#composer").hide();
	$(".match-messager").live("click",function(e){
		var id = $(this).attr("id");
		var memberId = id.split("_");
		$.get(qalanjo_url+"members/getMemberDetailsForMessage/"+memberId[1], function(data){
			var member = $.parseJSON(data);
			$("#full-name").html(member.Member.firstname+" "+member.Member.lastname);
			$("#age").html(member.Member.age);
			if ((member.Member.address1!="")&&(member.Member.city!="")){
				$("#location1").html(member.Member.address1+" "+member.Member.city);	
			}
			$("#PrivateMessageToId").val(memberId[1]);
			$("#location2").html(member.Member.state+" "+member.Country.name);
			if ($.trim(member.Member.picturePath)!=""){
				$("#profile-picture").html("<img src='"+qalanjo_url+"img/uploads/"+memberId[1]+"/default/profile_thumb_"+member.Member.picturePath+"'/>");
			}else{
				if (member.Member.gender_id==1){
					$("#profile-picture").html("<img src='"+qalanjo_url+"/css/img/blue/index/s-men.png'/>");
				}else{
					$("#profile-picture").html("<img src='"+qalanjo_url+"/css/img/blue/index/s-women.png'/>");
				}
			}
			if (role==2){
				$("#composer").dialog(
					{modal:true,
					height:385,
					width:500,
					title:"Write your message",
					show:"fade",
					hide:"fade", 
					buttons:{
						Exit:function(){
							$("#composer").dialog("close");
						}
					}}
				);
			}else{
				$("#composer").dialog(
					{modal:true, height:475, width:460, title:"Write your message to:", show:"fade", resizable:false, hide:"fade"}
				);
			}
		});
	
		e.preventDefault();
	});
});