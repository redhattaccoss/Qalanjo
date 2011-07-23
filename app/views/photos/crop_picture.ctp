<?php 

	echo $javascript->link('jcrop/jquery.Jcrop');
	echo $this->element('photos/profile_jcrop');
	echo $html->css('jquery.Jcrop');
	
	echo $form->create("Photo", array("url"=>"/photos/makeProfilePicture/". $photo['Photo']['id'], 'id'=>'formCropper'));
	echo $form->input("Photo.x1", array("type"=>"hidden", "id"=>"x1"));
	echo $form->input("Photo.y1", array("type"=>"hidden", "id"=>"y1"));
	echo $form->input("Photo.width", array("type"=>"hidden", "id"=>"width"));
	echo $form->input("Photo.height", array("type"=>"hidden", "id"=>"height"));
?>

	<div id="jcrop-wrapper">
		<?php 
			echo $html->image('uploads/' . $member_id . '/' . $albumName . '/' . $photo['Photo']['picture_path'],
						array('id'=>'cropbox'));
						
		?>
	</div>

	<input type="button" id="submitCrop" value="Done Cropping"/>
	<input type="hidden" id="doneCropping" value="" />