<?php 
	$path = "designs/blue/attributes/questionnaire/page10/";
?>
<div class="left" id="content_header">
	<h2>Sociability</h2>
</div>
<div class="left" id="content_main">
	<p class="instruction">Use the slider scale below to indicate how well each of the following describes you.</p>
	<?php 
		echo $this->Form->create("MemberAttributeWeight", array("url"=>"/attributes/questionnaire/".($page+1)));
	?>
	<div id="questions">
		<div id="question_header" class="right">
			<div id="stronglydisagree" class="choice right">
				Strongly Disagree
			</div>
			<div id="disagree" class="choice right">
				Disagree
			</div>
			<div id="neitheragree" class="choice right">
				Neither agree or disagree
			</div>
			<div id="agree" class="choice right">
				Agree
			</div>
			<div id="stronglyagree" class="choice right">
				Strongly Agree
			</div>
			
		</div>									
		
		<div class="left questions clear">
			<?php echo $this->element("blue/questionnaire/items")?>
		</div>


	</div>
	<p class="image_set_bottom">
		
		<span class="button right"><button type="submit"><span>Save and Continue</span></button></span>
		<?php 
			echo $this->Html->image($path."image010.jpg", array("class"=>"left", "alt"=>"Beautiful girls"));
			
		?>

	</p>
	
	<?php echo $this->Form->end();?>
</div>