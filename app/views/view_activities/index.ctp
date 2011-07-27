<?php 
	if ($render == "full"){
		?>
		<div class="span-15" id="content-main">
			<div id="title" class="span-15 last">
				<div class="span-10">
					<h2>Who Viewed Me
						<span>(<?php echo count($viewers)?>)</span>
					</h2>
				</div>
				<div class="span-5 last">
					<div id="button">
					
					</div>
				</div>
			</div>
			<div id="viewers_list" class="span-15 last">
				<?php 
					echo $this->element("viewers/viewers");
				?>
			</div>
			
		</div>
		<div class="span-4 last" id="content-sidebar">
			
		</div>
		<div id="composer">
			<fieldset class="span-10">
			<p>Write a new message.</p>
			<?php 
				echo $ajax->form(array("type"=>"post",
						'options' => array(
					        'model'=>'PrivateMessage',
					        'update'=>'message_result',
					        'url' => "/private_messages/writemessage/0",
							"complete"=>"close_window()"
					    )
					)
				);
				echo $form->input("PrivateMessage.member_id", array("type"=>"hidden", "value"=>$member["Member"]["id"]));
				echo $form->input("PrivateMessage.to_id", array("type"=>"hidden", "id"=>"to_id"));
				echo "<div class='span-10 last'>";
					echo $form->label("PrivateMessage.to", "To: ", array("class"=>"span-2"));
					echo "<div class='span-8 last' id='to'>";
						
					echo "</div>";
				echo "</div>";
				echo "<div class='span-10 last'>";
					echo $form->label("PrivateMessage.title", "Subject", array("class"=>"span-2"));
					echo $form->input("PrivateMessage.title", array("div"=>"span-8 last", "label"=>false));
				echo "</div>";
				echo "<div class='span-10 last'>";
					echo $form->label("PrivateMessage.content", "Content", array("class"=>"span-2"));
					echo $form->input("PrivateMessage.content", array("div"=>"span-8 last", "label"=>false));
				echo "</div>";			
				echo $form->submit("Send Message");
				echo $form->end();	
			?>
			</fieldset>
		</div>
		<div id="message_result">
			
		</div>
		<div id="wink">
			Do you want to wink at <span id="view_name"></span> ?
		</div>
		<?php 
			echo $javascript->link("custom/profile");
			echo $javascript->link("custom/wvme");
	}else{
		echo $this->element("viewers/viewers");
	}