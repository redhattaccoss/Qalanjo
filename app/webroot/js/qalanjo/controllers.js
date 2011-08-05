/**
 * Controllers for Qalanjo
 */
var Controller = new Interface("Controller", ["beforeFilter", "success", "process", "setMethod", "getMethod", "setSerialize", "getSerialize"]);

var AppController = function(url, target){ //implements Controller
	if (url!=null){
		this.url = url;
	} 
	if (target!=null){
		this.target = target;
	}
	this.serialize = null;
	this.method = "GET";
}

AppController.prototype = {
	beforeFilter:function(){
		
	}
	,success:function(data){
		
	}
	,process:function(){
		self = this;
		$(self.target).html("<div class='spinner'></div>");
		if (this.method == "POST"){
			$.post(this.url, this.serialize, function(data){
				self.success(data);
			});
		}else{
			$.get(this.url, function(data){
				self.success(data);
			});
		}
	},
	setMethod:function(method){
		this.method = method;
	},
	getMethod:function(){
		return this.method;
	}
}

var MembersController = function(url, target){ //inherits AppController
	this.AppController(url, target);
}
copyPrototype(MembersController, AppController);
MembersController.prototype.getDetails = function(info){
	this.url = QalanjoGlobal.baseUrl+"members/details/"+info;
	this.method = "GET";
	this.target = "";
	this.process();
}
