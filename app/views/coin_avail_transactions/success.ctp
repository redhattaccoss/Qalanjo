<?php 
	echo $html->css('blue/subscription_success', 'stylesheet', array('inline'=>false));
	echo $html->scriptBlock("
		$(document).ready(function(){
			$('#button').click(function(){
				window.location.href='{$html->url("/gifts")}';
			});
		});
	
	");
?>
<div class="content-container">
	<div id="success-wrap" class="span-24">
		<div class="span-6">
		<?php 
			echo $html->image("designs/blue/subscription_transactions/success/EmptyCart-success.png");
		?>
		</div>
		<div id="success" class="left">
			<div id="success-cont" class="left">
				<div id="success-text-container" class="left">
					<h2>Your order has succesfully processed.</h2>
					<p>Your account has been added additional <?php echo $qpoints?> QPoints.</p>
				</div>
			</div>
			<div id="btn-wrap" class="clear">
					<div id="button" class="clear">
						<p>Back to Gifts</p>
					</div>
			</div>
		</div>
	</div>
</div>