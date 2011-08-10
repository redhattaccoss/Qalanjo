/**
 * Qalanjo Main Thread
 */

var QalanjoEngine = function(baseUrl, controller, action, params, webroot, userId){
	QalanjoGlobal.baseUrl = baseUrl;
	QalanjoGlobal.controller = controller;
	QalanjoGlobal.action = action;
	QalanjoGlobal.params = params;
	QalanjoGlobal.webroot = webroot;
	QalanjoUserGlobal.authUserId = userId;
	QalanjoGlobal.defaultHeight = $(window).height()+"px";
};

QalanjoEngine.prototype = {
	start:function(){
		this.resize();
		var engine = EngineFactory.create(QalanjoGlobal.controller, QalanjoGlobal.action);
		engine.start(QalanjoGlobal.params);
		sessionChecker = new SessionChecker();
		sessionChecker.start();
	},
	resize:function(){
		var wrapperHeight = $(".wrapper-container").css("height").split("p");
		$("body").css("height", (wrapperHeight[0]-179)+"px");
		QalanjoGlobal.scrollHeight = $("body").css("height");
		$(window).scroll(function(){
			$(".container").css("margin-top", "-"+$(this).scrollTop()+"px");
		});
	}
};
var q;
$(document).ready(function(){
	q = new QalanjoEngine(qalanjo_url, qalanjo_controller, qalanjo_action, qalanjo_params, qalanjo_webroot, qalanjo_userid);
	q.start();
});