<div class="profile-wizard-content fill">
	<?php 
		echo $session->flash();
		echo $form->create('Member',array('url'=>"/members/edit/sk:$sk"));
		echo $form->input('MemberProfileAttributeWeight.member_id',array('value'=>$member_id,'type'=>'hidden'));
		echo $form->input('MemberProfileAttributeWeight.id',array('type'=>'hidden'));
		echo $form->input('MemberProfile.member_id',array('value'=>$member_id,'type'=>'hidden'));
		echo $form->input('MemberProfile.id',array('type'=>'hidden', "value"=>$this->data["MemberProfile"]["id"]));
		echo $form->input('Member.id',array('type'=>'hidden', "value"=>$this->data["Member"]["id"]));	
	?>
	<fieldset class="in-my-own-words">
		<h2><span>Leisures</span></h2>
		<dl>
			<dt>
				Choose three  activities that you mostly do during your free time.
			</dt>
			<dd>
				<div class="friends-say">
				<?php 
					echo $form->input("Leisure", array("multiple"=>"checkbox", "div"=>false, "label"=>false,"options"=>$leisures));
				?>
				</div>
			</dd>
		</dl>
	</fieldset>
	<button type=submit><span>Save and Continue</span></button>
</div>