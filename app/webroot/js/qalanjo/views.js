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
	$("#update-box").html("<ul></ul>");
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
	tpl+="<img src=\"@picture_path\" class='profile'/>";
	tpl+="<h4>@fullname</h4>";
	tpl+="<div class='user-controls'>";		
		tpl+="<a href='@gift_url'><img src=\""+url+"css/img/fixed/profile/gifticon.jpg\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/icebreaker.png\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/winkicon.jpg\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/messageicon.jpg\"/></a>";
	tpl+="</div>";
	tpl+="<span>@age years old</span><span>@address</span><span>@country</span><span>&nbsp;</span>";
	tpl+="<div class=\"message-box-arrow\"></div>";
    tpl+="<div class=\"message-box\"><p>@message</p></div><hr/></li>";
   
    
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
    tpl = tpl.replace("@picture_path", picture);
	tpl = tpl.replace("@fullname", item.Member.firstname+" "+item.Member.lastname);
	tpl = tpl.replace("@age", item.Member.age);
	tpl = tpl.replace("@address", address);
	tpl = tpl.replace("@message", item.Shout.message);
	tpl = tpl.replace("@country", item.Country.name);
	tpl = tpl.replace("@gift_url", url+"gifts/gift_match/"+item.Member.id);
	return tpl;
}

var PhotoUpdatesView = function(){
	AppView.call(this);
	this.currentTpl = "";
}
extend(PhotoUpdatesView, AppView);
PhotoUpdatesView.prototype.loadInitial = function(data){
	$("#update-box").html("<ul></ul>");
	var updates = $.parseJSON(data);
	var self = this;
	$.each(updates, function(i, item){
		var tpl = self.getPhotoUpdatesTemplate(item);
		$(tpl).appendTo("#update-box ul").hide().fadeIn(100);
	});
	q.resize();
}
PhotoUpdatesView.prototype.getPhotoUpdatesTemplate = function(item){
	var url = QalanjoGlobal.baseUrl;
	var tpl = " <li class=\"user-info clear\">";
	tpl+="<img src=\"@picture_path\" class='profile'/>";
	tpl+="<h4>@fullname</h4>";
	tpl+="<div class='user-controls'>";		
		tpl+="<a href='@gift_url'><img src=\""+url+"css/img/fixed/profile/gifticon.jpg\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/icebreaker.png\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/winkicon.jpg\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/messageicon.jpg\"/></a>";
	tpl+="</div>";
	tpl+="<span>@age years old</span><span>@address</span><span>@country</span><span>&nbsp;</span>";
	 
	if (item.PhotoUpdate.profile == 0){
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
		    	
		    });	
		tpl+="</ul></div>";
	}
    tpl+="<hr/></li>";	
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
	},
	
}
