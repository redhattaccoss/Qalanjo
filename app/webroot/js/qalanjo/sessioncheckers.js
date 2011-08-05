/**
 * Responsible for maintaining if user is online or not
 */

var SessionChecker = function(){
	this.finished = true;
	this.interval = 0;
	
};
SessionChecker.prototype = {
	start:function(){
		this.interval = setInterval(this.updateStatus, 1000, "javaScript");
	},
	updateStatus:function(){
		this.finished = false;
		self = this;
		userid = QalanjoUserGlobal.authUserId;
		if (userid!="null"){
			if (self.finished){
				$.ajax({
					url:QalanjoGlobal.baseUrl+"members/check_session/"+userid,
					success:function(data){
						if (($.trim(data)=="true")||($.trim(data)=="truetrue")){				
							$.ajax({
								url:QalanjoGlobal.baseUrl+"members/update_online",
								success:function(data){
									self.finished = true;
								}
							});
						}else if (data=="false"){
							clearInterval(self.interval);
							alert("Please login to continue");
							window.location.href = QalanjoGlobal.baseUrl+"members/login";
						}
					}
				});		
			}
		}	
	}
}