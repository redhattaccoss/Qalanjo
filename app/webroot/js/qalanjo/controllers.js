/**
 * Controllers for Qalanjo
 */
var Controller = new Interface("Controller", ["beforeFilter", "success", "process", "setMethod", "getMethod", "setSerialize", "getSerialize", "setCallback", "getCallback"]);

var AppController = function(url, target){ //implements Controller
	if (url!=null){
		this.url = url;
	} 
	if (target!=null){
		this.target = target;
	}
	this.serialize = null;
	this.method = "GET";
	this.action = "";
	this.controller = "";
	this.callback = "";
}

AppController.prototype = {
	beforeFilter:function(){
		
	}
	,success:function(data){
		this.callback(data);
	}
	,process:function(){
		var self = this;
		
		if (self.target!=""){
			$(self.target).html("<div class='spinner'></div>");
		}
		if (this.url == null){
			this.url = this.createUrl();
		}
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
	},
	createUrl:function(){
		return QalanjoGlobal.baseUrl+this.controller+"/"+this.action
	},
	setCallback:function(callback){
		this.callback = callback;
	},
	getCallback:function(){
		return this.callback;
	}
}
/**
 * Members Controller
 */
var MembersController = function(url, target){ //inherits AppController
	AppController.call(this);
	this.controller = "members";
}
extend(MembersController, AppController);
MembersController.prototype.getDetails = function(info){
	this.url = QalanjoGlobal.baseUrl+"members/details/"+info;
	this.method = "GET";
	this.target = "";
	this.process();
}


/**
 * Shout Controller
 */
var ShoutsController = function(url, target){//inherits AppController
	AppController.call(this);
	this.controller = "shouts";
	this.view = new ShoutsView();
};
extend(ShoutsController, AppController);
ShoutsController.prototype.post = function(data, target){
		this.serialize = data;
		this.setCallBack(this.shoutSuccessCallback);
		this.action = "post";
		this.target = "#"+target;
		this.method = "POST";
		this.process();
	};
ShoutsController.prototype.loadInitial = function(target){
	this.setCallback(this.loadInitialSuccessCallback);
	this.action = "load_shouts";
	if (target!=null){
		this.target = "#"+target;
	}
	this.method = "GET";
	this.process();
};
ShoutsController.prototype.loadInitialSuccessCallback = function(data){
	this.view.loadInitial(data);
};
ShoutsController.prototype.postSuccessCallback = function(data){
	
};