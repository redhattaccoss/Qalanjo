<?php
/**
 * View for the Message Composer
 * @version 0.0.1
 * @date 5/26/2011 
 */
?>
<div id="composer" title="Write New Message" class="ui-form">
	<?php if ($role==3){
			echo $ajax->form(array("type"=>"post",
					'options' => array(
				        'model'=>'PrivateMessage',
				        'update'=>'message_result',
				        'url' => "/private_messages/writemessage/0",
						"complete"=>"close_window()"
				    )
				)
			);
		
	?>
	<fieldset class="dialog-content left">
		<div class="left icebreaker-profile-info">
			<div class="profile-picture left">
				<div id="profile-picture" class="profile-picture-bg left">
					
				</div>
			</div>
			<div class="profile-info left">
				<h4 class="left" id="full-name">
					
				</h4>
				<span class="left clear age">
					<span id="age"></span> years old.
				</span>
				<span id="location1" class="left clear location">
				
				</span>
				<span id="location2" class="left clear location">
				</span>
			</div>
		</div>
		
		
		<dl class="left message-writer">
				<?php 
					echo $form->input("PrivateMessage.member_id", array("type"=>"hidden", "value"=>$member["Member"]["id"]));
					echo $form->input("PrivateMessage.to_id", array("type"=>"hidden"));
				?>
			
			<dt class="left">
				Subject:
			</dt>
			<dd class="left clear">
				<?php 
					echo $form->input("PrivateMessage.title", array("div"=>false, "class"=>"subject-text left", "label"=>false));		
				?>
			</dd>
			<dt class="left clear">
				Message:
			</dt>
			<dd class="left clear">
				<?php 
					echo $form->input("PrivateMessage.content", array("div"=>false, "class"=>"tinymce text_field left", "label"=>false));		
				?>
			</dd>
		
		</dl>
		
	</fieldset>
	<div class="buttonpane buttonpane-message ui-widget-content left ui-helper-clearfix">
		<div class="buttonset">
			<button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
				<span class="ui-button-text">Send Message</span>
			</button>
		</div>
		
	</div>
	<?php
		echo $form->end();
	}else{?>
		<div class="subscribe-message left">
			<div class="left message-notification">
				<p>You needed to subscribe to start communicating with the person.</p>
			</div>
			<div class="subscribe-information left">
				<div id="profile-picture" class="profile-picture left">
					
				</div>
				<div class="profile-info left">
					<span id="full-name" class="name left">
						
					</span>	
					<span id="location2" class="location left clear">
						
					</span>	
					<div class="clear icon-set left">
						<?php 
							echo $html->image("/css/img/blue/dialog/arrow-full.png", array("class"=>"left arrow-full"));
							echo $html->image("/css/img/blue/dialog/arrow-blur.png", array("class"=>"left arrow-blur"));
							echo $html->image("/css/img/blue/dialog/message-icon.png", array("class"=>"left message-icon"));
							echo $html->image("/css/img/blue/dialog/subscribe-small.png", array("class"=>"left subscribe-small", "url"=>"subscribe"));
						?>
					</div>
				</div>
			</div>	
		</div>
	<?php }?>
</div>