<?php 
	echo $javascript->link('jcrop/jquery.Jcrop');
	echo $this->element('photos/profile_jcrop');
	echo $html->css('jquery.Jcrop');
	echo $html->css("blue/cropimages");
?>
<h1 class="crop">Crop</h1>
<div class="horizontalbar"></div>
<?php 	
	echo $form->create("Photo", array("url"=>"/photos/makeProfilePicture/". $photo['Photo']['id'], 'id'=>'formCropper'));
	echo $form->input("Photo.x1", array("type"=>"hidden", "id"=>"x1"));
	echo $form->input("Photo.y1", array("type"=>"hidden", "id"=>"y1"));
	echo $form->input("Photo.width", array("type"=>"hidden", "id"=>"width"));
	echo $form->input("Photo.height", array("type"=>"hidden", "id"=>"height"));
?>

<div class="cropimages left">
	<div class="notifications">
		Drag the corners of the transparent box below to crop this photo into your profile picture.
    </div>
    <div class="imagecontainer">
	    <div id="jcrop-wrapper">
			<?php 
				echo $html->image('uploads/' . $member_id . '/' . $albumName . '/' . $photo['Photo']['picture_path'],
							array('id'=>'cropbox'));
							
			?>
		</div>
    </div>
    <div class="right buttoncontainer">
	     <input type="button" id="submitCrop" value="Done Cropping"/>
    </div>
</div>

<input type="hidden" id="doneCropping" value="" />