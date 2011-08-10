<div class="content-container">
	<div class="subscription-form left">
			<div id="summary" class="error left form">
				&nbsp;
			</div>
			<h2 class="step-arrow left">
				<span>Step 2</span>
			</h2>
			<div class="order-form right">
				<h2 class="left"><span class="right">Order Summary</span></h2>
				<div class="order-summary left">
					<div class="description left">
						<?php echo $selectedSubscription["SubscriptionType"]["months"]?> months subscription
					</div>
					<div class="details right">
						<span class="right">$<?php echo $selectedSubscription["SubscriptionType"]["price"]?></span>
							
					</div>
					<div class="total left clear">
						Total Amount
					</div>
					<div class="total right amount">
						<span class="right">$ <?php echo round($selectedSubscription["SubscriptionType"]["price"], 2)?></span>
					</div>
				</div>
			</div>
			<?php 
				echo $this->element("blue/checkout/checkout", array(
							"model"=>"SubscriptionTransaction",
							"price"=>round($selectedSubscription["SubscriptionType"]["price"]*$selectedSubscription["SubscriptionType"]["months"], 2),
							"description"=>$selectedSubscription["SubscriptionType"]["description"],
							"type"=>$selectedSubscription["SubscriptionType"]["id"]
							,"url"=>"/subscription_transactions/checkout"))?>
				
	</div>
</div>