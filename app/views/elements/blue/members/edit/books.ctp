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
<fieldset class="image-based">
	<h2><span>Music</span></h2>
	<dl>
		<dt>
			What book do you usually read?
		</dt>
		<dd>
			<ul class="image-list books">
				<?php 
					echo $this->element("blue/members/edit/populatelist");
				?>
				<li class="answer14">
					<label>
						<em></em>
						<input type="checkbox" class="no-check"/>
						<span>I don't like reading books.</span>
					</label>
				</li>
				
				
			</ul>
		</dd>
	</dl>
	<button type=submit><span>Save and Continue</span></button>
</fieldset>
<?php echo $form->end()?>
</div>
	