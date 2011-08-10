/**
 * Engine Interface
 */
var Engine = new Interface("Interface", ["start", "scope"]);

/**
 * Engine Factory
 */
var EngineFactory = {
	create:function(controller, action){
		var engine;
		if ((controller=="Members")&&(action=="step")){
			engine = new StepsEngine();
		}else if ((controller=="Members")&&(action=="index")){
			engine = new MembersIndexEngine();
		}
		Interface.ensureImplements(engine, Engine);
		return engine;
	}	
};
 

/**
 * Engine classes for Pages
 */
var StepsEngine = function(){ //implements Engine
	
}
StepsEngine.prototype = {
	start:function(params){
		if (params!="null"){
			var data = $.parseJSON(params);
			switch(data.page){
			case 1:
				this.page1();
				break;
			case 2:
				this.page2();
				break;
			case 3:
				this.page3(params);
				break;
			}
				
		}
	},
	page1:function(){
		$('#country').live("change", function() {
			if($('#country :selected').text() == 'United States') {
				$("#state").attr("disabled", false);
			} else {
				$("#state").attr("disabled", true);
			}
		});	
		$("#country").val(236);
		$.validator.addMethod("defaultSelected", function(value){
			return CustomValidators.defaultSelectedCombo(value);
		});
		
		$.validator.addMethod("defaultSelectedState", function(value){
			return CustomValidators.defaultSelectedState(value);
		});
		
		QalanjoGlobal.validator = $("#step-1").validate({
			errorElement: "em",
			errorPlacement: function(error, element) {
				element.removeClass("error").parent("dd").children(".required").html("");
				error.removeClass("error").addClass("error_label").appendTo(element.parent("dd").children(".required"));
			},
			success: function(label) {
				label.text("");
				if (QalanjoGlobal.validator.numberOfInvalids()==0){
					$("#summary").hide();	
				}
			},
			submitHandler:function(form){
				$(form).ajaxSubmit(options);
			},
			rules: {
				"data[Member][country_id]": {
					required:true,
					defaultSelected:true
					
				},
				"data[Member][state]":{
					defaultSelectedState:true,
					required:true
				},
				"data[Member][zipcode]": {
					required:true,
					number:true,
					minlength:4,
					maxlength:10
				}
			},
			messages:{
				"data[Member][country_id]":{
					defaultSelected:"Select the country where you live"
				},
				"data[Member][state]":{
					defaultSelectedState:"Select the state where you live"
				}
			}
		});
	},
	page2:function(){
		
	},
	page3:function(params){
		var url = QalanjoGlobal.webroot+"img/uploads/"+params.memberId+"/default";
		var self = this;
		$("#file_upload").uploadify({
			'uploader':QalanjoGlobal.baseUrl+"js/uploader/uploadify.swf",
			'folder':url, 
			'auto':true, 
			'buttonImg'   : QalanjoGlobal.baseUrl+"js/uploader/choosefile.gif",
			'script':QalanjoGlobal.baseUrl+"js/uploader/uploadify.php",
			'cancelImg':QalanjoGlobal.baseUrl+"js/uploader/cancel.png",
			'onComplete'  : function(event, ID, fileObj, response, data) {
				$.get(QalanjoGlobal.baseUrl+'member_profiles/process_signup_upload/'+response, function(data){
					if (call==-1){
						alert("Upload complete!");
						window.location.href=QalanjoGlobal.baseUrl+"members/account";
					}else{
						var result = $.parseJSON(data);
						if (result.result=="success"){
							self.showDialog();
						}
					}
				});
			},
		 	'fileExt'     : '*.jpg;*.gif;*.png',
		 	'fileDesc'    : 'Image Files'
		});
	},
	showDialog:function(){
		$("body").scrollTop(0).css("overflow-y", "hidden").$("body").css("height", QalanjoGlobal.defaultHeight);
		var height = QalanjoGlobal.defaultHeight.split("p");
		var width = $("body").css("width").split("p");
		var objHeight = $(".container-dialog").css("height").split("p");
		var objWidth = $(".container-dialog").css("height").split("p");
		$(".container-dialog").css("left", ((width[0]/2)-objWidth[0])+"px").css("top", ((height[0]/2)-objHeight[0])+"px").fadeIn();
		$("#overlay").fadeIn();
	},
	scope:function(self){
		this.self = self;
	},
	configureDialog:function(){
		var self = this;
		$(".buttonclose").click(function(e){
			self.closeDialog();
			e.preventDefault();
		});
		$(".buttontest").click(function(e){
			self.closeDialog();
			window.location.href = qalanjo_url+"profile_completion";
			e.preventDefault();
		});
		$(".skipthis").click(function(e){
			self.closeDialog();
			window.location.href = qalanjo_url+"welcome";
			e.preventDefault();
		});	
	},
	closeDialog:function(){
		$("body").scrollTop(0).css("height", QalanjoGlobal.scrollHeight).css("overflow-y", "visible");	
		$(".container-dialog").fadeOut();
		$("#overlay").fadeOut();	
	}
};


var MembersIndexEngine = function(){//implements Engine
	
}
MembersIndexEngine.prototype = {
	start:function(params){
		var sc = new ShoutsController();
		sc.loadInitial();
		var mc = new MembersController();
		mc.loadCounters();
		var photoC = new PhotoUpdatesController();
		MessageBoxHelper.start();
		$("#shoutbox").submit(function(e){
			if ($.trim($("#shoutbox-message").val())!=""){
				sc.post($(this).serialize());				
			}
			return false;
		})
		
		/**
		 * Recent activity was clicked
		 */
		$("#recent-activity-link").click(function(e){
			sc.loadInitial();
			e.preventDefault();
		});
		
		/**
		 * Profile link was clicked
		 */
		$("#profile-link").click(function(e){
			mc.loadProfile(QalanjoUserGlobal.authUserId);
			e.preventDefault();
		});
		
		
		$(".profile-feeds li a").click(function(e){
			$(".profile-feeds li a.active").removeClass("active");
			$(this).addClass("active");
			e.preventDefault();
		});
		
		/**
		 * Event handler definition for toggle profile link
		 */
		$(".toggle-profile-link").click(function(e){
			var item = $(this);
			$("#item-links-content").html("<div class='spinner'>Loading...</div>");
			$.get($(this).attr("href"), function(data){
				var data = $.parseJSON(data);
				if (data.result==1){
					$("#item-links-content").html("");
					$(".profile-info-profile-details .item-links li.active").removeClass("active");
					item.parent("li").addClass("active");
					$("<p>"+data.info+"</p>").appendTo("#item-links-content").hide().fadeIn();
				}
			});
			e.preventDefault();
		});
		/**
		 * When photo was clicked
		 */
		$("#photo-link").click(function(e){
			photoC.loadInitial();
			e.preventDefault();
		});
		/**
		 * Event for viewing matches
		 */
		$("#button-view").click(function(e){
			window.location.href = QalanjoGlobal.baseUrl+"matches";
			e.preventDefault();
		});
		
	},
	scope:function(self){
		this.self = self;
	}
}