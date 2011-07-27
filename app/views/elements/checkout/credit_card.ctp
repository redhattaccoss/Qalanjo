<fieldset class="span-12 container" id="credit_card">
<legend>Payment Information</legend>
<?php 
	echo "<div class='span-12 last'>";
		echo $form->label("Member.firstname", "First Name", array("class"=>"span-5"));
		echo $form->input('Member.firstname', array("label"=>false,"div"=>"span-7 last", "value"=>$member["Member"]["firstname"]));
	echo "</div>";
	echo "<div class='span-12 last'>";
		echo $form->label("Member.lastname", "Last Name", array("class"=>"span-5"));
		echo $form->input('Member.lastname', array("label"=>false,"div"=>"span-7 last", "value"=>$member["Member"]["lastname"]));
	echo "</div>";
	echo "<div class='span-12 last'>";
		echo $form->label("CreditCard.credit_type", "Credit Card", array("class"=>"span-5"));
		echo $form->input('CreditCard.credit_type', array("type"=>"select", "label"=>false,"options"=>$credit_cards,"div"=>"span-7 last"));
	echo "</div>";
	echo "<div class='span-12 clear'>";
		echo $form->label("CreditCard.card_number", "Card Number", array("class"=>"span-5"));
		echo $form->input("CreditCard.card_number", array("label"=>false, "div"=>"span-7 last"));
	echo "</div>";
	
	echo "<div class='span-12 clear'>";
		echo $form->label("CreditCard.cv_code", "Card Verification Code", array("class"=>"span-5"));
		echo $form->input('CreditCard.cv_code', array("label"=>false, "div"=>"span-7 last"));
	echo "</div>";
	
	echo "<div class='span-12 clear'>";
		echo $form->label("CreditCard.expiration_year", "Expiration Year", array("class"=>"span-5"));
		echo $form->year('CreditCard.expiration_year', date("Y"), date("Y")+5,date("Y")+1,array("div"=>"span-7 last", "label"=>false, "empty"=>false));
	echo "</div>";
	
	echo "<div class='span-12 clear'>";
		echo $form->label("CreditCard.expiration_month", "Expiration Month", array("class"=>"span-5"));
		echo $form->month('CreditCard.expiration_month', "January", array("div"=>"span-7 last", "label"=>false, "empty"=>false));
	
	echo "</div>";


?>
</fieldset>