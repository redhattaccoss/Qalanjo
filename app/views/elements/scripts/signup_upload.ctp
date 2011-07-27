<script type="text/javascript">
//<![CDATA[

$(document).ready(function(){

		<?php
			$path = Configure::read("upload_path");
		?>
		var url = '<?php echo $path?>/app/webroot/img/uploads/<?php echo $member_id?>/default';
		//var url = '/qalanjo/app/webroot/img/uploads/<?php echo $member_id?>/default';
		
		$("#file_upload").uploadify({
			'uploader':'<?php echo $html->url("/js/uploader/uploadify.swf")?>',
			'folder':url, 
			'auto':true, 
			'buttonImg'   : '<?php echo $html->url("/js/uploader/choosefile.gif")?>',
			'script':'<?php echo $html->url("/js/uploader/uploadify.php")?>',
			'cancelImg':'<?php echo $html->url("/js/uploader/cancel.png")?>',
			'onComplete'  : function(event, ID, fileObj, response, data) {
				$.get('<?php echo $html->url("/member_profiles/process_signup_upload/")?>'+response, function(data){
					if (call==-1){
						alert("Upload complete!");
						window.location.href=qalanjo_url+"members/account";
					}else{
						var result = $.parseJSON(data);
						if (result.result=="success"){
							showDialog();
						}
					}
				});
			},
		 	'fileExt'     : '*.jpg;*.gif;*.png',
		 	'fileDesc'    : 'Image Files'
		});
		if (call!=-1){
		configureDialog();
		}
		if (call==1){
			showDialog();
		}
	});
//]]>


</script>