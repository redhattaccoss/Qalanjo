/**
 * Views
 */
var View = new Interface("View", ["beforeRender", "afterRender"]);
var AppView = function(){//implements View
	
}
AppView.prototype = {
	beforeRender:function(){
		
	},
	afterRender:function(){
		
	}
}
var ShoutsView =  function(){
	AppView.call(this);
	this.currentTpl = "";
}
extend(ShoutsView, AppView);
ShoutsView.prototype.loadInitial = function(data){
	var shouts = $.parseJSON(data);
	var self = this;
	$("#update-box").removeClass("about-me");
	$("#update-box").html("<ul></ul>").removeClass("about-me").fadeIn(200);
	$("#shoutbox").show();
	$.each(shouts, function(i, item){
		var tpl = self.getShoutTemplate(item);
		$(tpl).appendTo("#update-box ul").hide().fadeIn(500);
		q.resize();
	});
};
ShoutsView.prototype.post = function(data){
	var shout = $.parseJSON(data);
	var self = this;
	var tpl = this.getShoutTemplate(shout);
	$(tpl).prependTo("#update-box ul").hide().fadeIn(500);
	$("#shoutbox-message").val("");
	q.resize();
}
ShoutsView.prototype.getShoutTemplate = function(item){
	var url = QalanjoGlobal.baseUrl;
	var userid = QalanjoUserGlobal.authUserId;
	var tpl = " <li class=\"user-info\">";
	tpl+="<a href='@profilePicturePath'><img src=\"@picture_path\" class='profile'/></a>";
	tpl+="<h4><a href='@profilePath'>@fullname</a></h4>";
	tpl+="<div class='user-controls'>";		
		tpl+="<a href='@gift_url'><img src=\""+url+"css/img/fixed/profile/gifticon.jpg\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/icebreaker.png\"/></a>"+"<a href='#' ><img src=\""+url+"css/img/fixed/profile/winkicon.jpg\" class='winker' id='wink_@id'/></a>"+"<a href='#' id='message_@messageid' class='match-messager'><img src=\""+url+"css/img/fixed/profile/messageicon.jpg\"/></a>";
	tpl+="</div>";
	tpl+="<span>@age years old</span><span>@address</span><span>@country</span><span>&nbsp;</span>";
	tpl+="<div class=\"message-box-arrow\"></div>";
    tpl+="<div class=\"message-box\"><p>@message</p></div><hr/></li>";

    var profile = url+"members/profile/"+item.Member.id;
    var picture = url+"img/uploads/"+item.Member.id+"/default/profile_thumb_"+item.MemberProfile.picture_path;
	var address = "";
	if ($.trim(item.Member.address1)!=""){
		address+=item.Member.address1+", ";
	}
	if ($.trim(item.Member.city)!=""){
		address+=item.Member.city+", ";
	}
	if ($.trim(item.Member.state)!=""){
		address+=item.Member.state;
	}
	tpl = tpl.replace("@messageid", item.Member.id);
	tpl = tpl.replace("@profilePicturePath", profile);
	tpl = tpl.replace("@profilePath", profile);
	tpl = tpl.replace("@id", item.Member.id);
    tpl = tpl.replace("@picture_path", picture);
	tpl = tpl.replace("@fullname", item.Member.firstname+" "+item.Member.lastname);
	tpl = tpl.replace("@age", item.Member.age);
	tpl = tpl.replace("@address", address);
	tpl = tpl.replace("@message", item.Shout.message);
	tpl = tpl.replace("@country", item.Country.name);
	tpl = tpl.replace("@gift_url", url+"gifts/gift_match/"+item.Member.id);
	return tpl;
}

/**
 * Photo Updates View
 */
var PhotoUpdatesView = function(){
	AppView.call(this);
	this.currentTpl = "";
}
extend(PhotoUpdatesView, AppView);
PhotoUpdatesView.prototype.loadInitial = function(data){
	$("#shoutbox").hide();
	$("#update-box").html("<ul class='root'></ul>").removeClass("about-me");
	var updates = $.parseJSON(data);
	var self = this;
	$.each(updates, function(i, item){
		var tpl = self.getPhotoUpdatesTemplate(item);
		$(tpl).appendTo("#update-box ul.root").hide().fadeIn(100);
	});
	q.resize();
}
PhotoUpdatesView.prototype.getPhotoUpdatesTemplate = function(item){
	var url = QalanjoGlobal.baseUrl;
	var tpl = " <li class=\"user-info clear\">";
	tpl+="<a href='@profilePicturePath'><img src=\"@picture_path\" class='profile'/></a>";
	tpl+="<h4><a href='@profilePath'>@fullname</a></h4>";
	tpl+="<div class='user-controls'>";		
		tpl+="<a href='@gift_url'><img src=\""+url+"css/img/fixed/profile/gifticon.jpg\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/icebreaker.png\"/></a>"+"<a href='#' class='winker' id='wink_@id'><img src=\""+url+"css/img/fixed/profile/winkicon.jpg\"/></a>"+"<a href='#' id='message_@messageid' class='match-messager'><img src=\""+url+"css/img/fixed/profile/messageicon.jpg\"/></a>";
	tpl+="</div>";
	tpl+="<span>@age years old</span><span>@address</span><span>@country</span><span>&nbsp;</span>"; 
	if (item.PhotoUpdate.profile == "0"){
		tpl+="<div class=\"picture-box\"><ul>";
		var count = item.Photos.length;
		$.each(item.Photos, function(i, pic){
				if (i==count){
		    		return;
		    	}	
				var ipl="<li>";
			    	ipl+="<div class='photo-thumbnail'>";	
			    		ipl+="<img src='@pic'/>";
			    	ipl+="</div>";
		    	ipl+="</li>";
		    	
		    	var img = url+"img/uploads/"+item.Member.id+"/"+item.albumName+"/thumb_"+pic;
		    	ipl = ipl.replace("@pic", img);
		    	tpl+=ipl;
		    	
		    	ipl = "";
		    });	
		tpl+="</ul></div>";
	}
    tpl+="<hr/></li>";	
	var picture = url+"img/uploads/"+item.Member.id+"/default/profile_thumb_"+item.MemberProfile.picture_path;
	var profile = url+"members/profile/"+item.Member.id;
	var address = "";
	if ($.trim(item.Member.address1)!=""){
		address+=item.Member.address1+", ";
	}
	if ($.trim(item.Member.city)!=""){
		address+=item.Member.city+", ";
	}
	if ($.trim(item.Member.state)!=""){
		address+=item.Member.state;
	}
	tpl = tpl.replace("@messageid", item.Member.id);
	tpl = tpl.replace("@profilePath", profile);
	tpl = tpl.replace("@profilePicturePath", profile);
	tpl = tpl.replace("@id", item.Member.id);
    tpl = tpl.replace("@picture_path", picture);
	tpl = tpl.replace("@fullname", item.Member.firstname+" "+item.Member.lastname);
	tpl = tpl.replace("@age", item.Member.age);
	tpl = tpl.replace("@address", address);
	tpl = tpl.replace("@country", item.Country.name);
	tpl = tpl.replace("@gift_url", url+"gifts/gift_match/"+item.Member.id);
	return tpl;
}

var MessageBoxHelper = {
	start:function(){
		$("#wink").hide();
		$("#gift-box").hide();
		$("#composer").hide();
		
		$(".winker").live("click", function(e){
			var temp = $(this).attr("id");
			var id = temp.split("_");
			$.ajax({
				url:qalanjo_url+"members/getMemberJSON/"+id[1],
				success:function(data){
					var temp = $.parseJSON(data);
					$("#wink_name").text(temp.Member.firstname);
					MessageBoxHelper.askAndWink(id[1]);
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
				if (QalanjoUserGlobal.authRole==2){
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

	},
	show_composer:function(){
		$("#composer").dialog(
			{modal:true, height:400, width:450, title:"Write your message", show:"fade", hide:"fade"}
		);
	},
	close_window:function(){
		$("#composer").dialog('close');
		this.show_message();
	},
	show_message:function(){
		$("#message_result").dialog({
			modal:true, height:280, width:339,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
				}			
			},
			show:"fade",
			hide:"fade",
			resizable:false
		});
	},
	askAndWink:function(id){
		var self = this;
		$( "#wink" ).dialog( "destroy" );
		$( "#wink" ).dialog({
			resizable: false,
			height:280,
			width:339,
			modal: true,
			title:"Send Wink",
			buttons: {
				Wink: function() {
					$("#message_result").load(qalanjo_url+'members/wink/'+id, function(){
						self.show_message();
						$('.ui-dialog-title').text('Wink sent!');
						$("#wink").dialog( "close" );
					});
					
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			show:"fade",
			hide:"fade"
		});
	}
}

