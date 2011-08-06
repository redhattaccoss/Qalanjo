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
	var url = QalanjoGlobal.baseUrl;
	var userid = QalanjoUserGlobal.authUserId;
	var self = this;
	$.each(shouts, function(i, item){
		var tpl = " <li class=\"user-info\">";
		tpl+="<img src=\"@picture_path\" class='profile'/>";
		tpl+="<h4>@fullname</h4>";
		tpl+="<div class='user-controls'>";		
			tpl+="<a href='#'><img src=\""+url+"css/img/fixed/profile/gifticon.jpg\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/icebreaker.png\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/winkicon.jpg\"/></a>"+"<a href='#'><img src=\""+url+"css/img/fixed/profile/messageicon.jpg\"/></a>";
		tpl+="</div>";
		tpl+="<span>@age years old</span><span>@address</span><span>@country</span><span>&nbsp;</span>";
		tpl+="<div class=\"message-box-arrow\"></div>";
        tpl+="<div class=\"message-box\"><p>@message</p></div><hr/></li>";
        var picture = url+"img/uploads/"+userid+"/default/profile_thumb_"+item.MemberProfile.picture_path;
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
		$(tpl).appendTo("#update-box ul").hide().fadeIn(100);
	});
}