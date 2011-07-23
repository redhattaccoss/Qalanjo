<div id="writeMessageDialog" title="Write New Message">
	<fieldset class="left dialog-content">
		<?php 
			echo $form->create("PrivateMessage", array("action"=>"writemessage", "id"=>"newmessage"));
		?>
		<dl class="left">
			<dt class="left">
				To
			</dt>
			<dd class="left">
			
				<?php 
					echo $form->input("PrivateMessage.member", array("div"=>false, "class"=>"to-member", "label"=>false, "id"=>"member_search"));		
					echo $form->input("PrivateMessage.to_id", array("type"=>"hidden"));
				?>
				<button class="match-selector">
				</button>
			</dd>
			<dt class="left clear">
				Subject
			</dt>
			<dd class="left">
				<?php 
					echo $form->input("PrivateMessage.title", array("div"=>false, "class"=>"subject-text", "label"=>false));		
				?>
			</dd>
			<dt class="left clear">
				Message
			</dt>
			<dd class="left">
				<?php 
					echo $form->input("PrivateMessage.content", array("div"=>false, "class"=>"tinymce text_field", "label"=>false));		
				?>
			</dd>
		
		</dl>
		<?php 
			echo $form->end();
		?>
	</fieldset>
</div>