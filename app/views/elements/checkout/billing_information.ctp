<fieldset class="span-12 container">
	<legend>Billing Information</legend>
	<p class="span-12"></p>

	<?php 
		echo "<div class='span-12 clear'>";
		echo $form->label("Member.country", "Country", array("class"=>"span-5"));
		echo $form->input("Country.country_code", array("type"=>"hidden", "value"=>$member["Country"]["country_code"]));
		?>
		<span class="span-7 last">
			<strong><?php echo $member["Country"]["name"]?></strong>
		</span>
		
	<?php 
		echo "</div>";
	?>	
	<?php 
	echo "<div class='span-12 last'>";
		echo $form->label("Member.address1", "Address 1", array("class"=>"span-5"));
		echo $form->input('Member.address1', array("label"=>false,"div"=>"span-7 last", "value"=>$member["Member"]["address1"]));
	echo "</div>";
	echo "<div class='span-12 clear'>";
		echo $form->label("Member.address2", "Address 2", array("class"=>"span-5"));
		echo $form->input('Member.address2', array("label"=>false,"div"=>"span-7 last", "value"=>$member["Member"]["address2"]));
	echo "</div>";
	
	echo "<div class='span-12 clear'>";
		echo $form->label("Member.state", "State", array("class"=>"span-5"));
		echo $form->input('Member.state', array("label"=>false,"div"=>"span-7 last", "value"=>$member["Member"]["state"]));
	echo "</div>";
	echo "<div class='span-12 clear'>";
		echo $form->label("Member.city", "City", array("class"=>"span-5"));
		echo $form->input('Member.city', array("label"=>false,"div"=>"span-7 last", "value"=>$member["Member"]["city"]));
	echo "</div>";
	
	echo "<div class='span-12 clear'>";
		echo $form->label("Member.zipcode", "Zip Code", array("class"=>"span-5"));
		echo $form->input('Member.zipcode', array("label"=>false,"div"=>"span-7 last", "value"=>$member["Member"]["zipcode"]));
	echo "</div>";
	
	?>
</fieldset>