<?php 
	$path = "/css/img/blue/subscribe/";
	
?>
<div class="settings-container left">
    <div class="subscribe-banner left">
    	<?php echo $html->image($path."encourage.png", array("class"=>"left", "alt"=>"Subscribe Now"))?>
    </div>
    <div class="encourage-line left">
        <div class="encourage-line-message left">
            <strong class="left"><?php echo $member["Member"]["firstname"]." ".$member["Member"]["lastname"]?></strong>
            <span class="left clear">Experience the Qalanjo
                difference.</span>
        </div>
        <div class="arrow left">
        </div>
        <div class="arrow-yellow left">
        </div>
        <div class="feature-message right">
            <h2>Premium Personality Profile and other Basic Plus features.</h2>
        </div>
    </div>
    <div class="clear left spacer-line">
    </div>
    <div id="frames" class="left frames">
        <div id="viewport" class="viewport left">
            <?php 
            	$i=0;
            	foreach($types as $type){
            		$classItem = "";
            		$classSpace = "";
            		$classButton = "";
            		if ($type["SubscriptionType"]["recurring"]==1){
            			$classItem = " subscription-item-recur";
            			$classSpace = " item-spacer-no-color";	
            			$classButton = "recur";
            		}
            	?>
            		<div class="left subscription-item <?php echo $classItem?>">
		                <h3 class="months"><?php echo $type["SubscriptionType"]["months"]?> months</h3>
		                <h2 class="subscription-description <?php echo $type["SubscriptionType"]["class"]?>"><?php echo $type["SubscriptionType"]["month"]?></h2>
		                <h2 class="price">$ <?php echo $type["SubscriptionType"]["price"]?></h2>
		                <h3 class="permonth">per month</h3>
		                <div class="join">
		                	<?php 
		                		$option = array("class"=>$classButton, "id"=>"item_".$type["SubscriptionType"]["id"]);
		                		if ($type["SubscriptionType"]["recurring"]==0){
		                			echo $html->link(" ", "/subscription_transactions/checkout_paypal/".$type["SubscriptionType"]["id"], $option);
		                		}else{
		                			echo $html->link(" ", "/subscription_transactions/checkout_recur_paypal/".$type["SubscriptionType"]["id"], $option);
		                		} 
		                	?>
		                    
		                </div>
		            </div>
		            <?php 
		            	if ($i+1==count($types)){
		            		$classSpace = " item-spacer-no-color";	
		            	
		            	}
		            
		            ?>
		            <div class="item-spacer <?php echo $classSpace?> left">
		            </div>
            	<?php 	
            		$i++;
            	}
            	for($i;$i<4;$i++){
            		?>
            		<div class="left subscription-item-spacer">
            		</div>
            		<div class="item-spacer item-spacer-no-color left">
		            </div>
            		<?php 
            	}
            	
            ?>
            
            <div class="control-pay left">
                <div class="select-method left">
                    <p>
                        Select your mode of payment
                    </p>
                </div>
                <div class="arrow-back left" id="arrow-back">
                </div>
                <div class="paypal-pay left">
                </div>
                <div class="cc-pay left">
                </div>
            </div>
        </div>
    </div>
    <div class="reasons left">
        <div class="benefits left">
            <h2 class="left"><span class="membership-plan-header left">Membership
                    Plan Features</span><span class="premium-header left">Premium</span><span class="free-header left">Free</span></h2>
            <ul class="benefit-list left">
                <li>
                    <div class="col1 left">
                        Receive daily personalized match
                    </div>
                    <div class="col2 left">
                        <div class="checkblue check left">
                        </div>
                    </div>
                    <div class="col2 left">
                    </div>
                </li>
                <li>
                    <div class="col1 left">
                        Receive daily updates directly to your email
                    </div>
                    <div class="col2 left">
                        <div class="checkblue check left">
                        </div>
                    </div>
                    <div class="col2 left">
                    </div>
                </li>
                <li>
                    <div class="col1 left">
                        Wink to express your interest
                    </div>
                    <div class="col2 left">
                        <div class="checkblue check left">
                        </div>
                    </div>
                    <div class="col2 left">
                        <div class="checkgray check left">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="col1 left">
                        Send free ice breakers.
                    </div>
                    <div class="col2 left">
                        <div class="checkblue check left">
                        </div>
                    </div>
                    <div class="col2 left">
                        <div class="checkgray check left">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="col1 left">
                        Organize your contacts using the Matches page
                    </div>
                    <div class="col2 left">
                        <div class="checkblue check left">
                        </div>
                    </div>
                    <div class="col2 left">
                    </div>
                </li>
                <li>
                    <div class="col1 left">
                        See who viewed your profile
                    </div>
                    <div class="col2 left">
                        <div class="checkblue check left">
                        </div>
                    </div>
                    <div class="col2 left">
                        <div class="checkgray check left">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="col1 left">
                        Find your matches using our custom Single Finder
                        System
                    </div>
                    <div class="col2 left">
                        <div class="checkblue check left">
                        </div>
                    </div>
                    <div class="col2 left">
                    </div>
                </li>
                <li>
                    <div class="col1 left">
                        Build your personal profile page
                    </div>
                    <div class="col2 left">
                        <div class="checkblue check left">
                        </div>
                    </div>
                    <div class="col2 left">
                        <div class="checkgray check left">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="why-qalanjo left">
            <h2>Why Qalanjo?</h2>
            <p class="works">
                It works!
            </p>
            <p class="works-reason">
                Qalanjo.com gives you a chance to meet with
                strangers who will eventually play a very important role in your life.
            </p>
            <p class="payment">
                <strong>We accept payment</strong>
            </p>
            <p>
            	<?php echo $html->image($path."cc_cards_s1.png", array("alt"=>"visa amex paypal master"))?>
            </p>
            <p class="read-more">
                <a href="#">Read more about Qalanjo</a>
            </p>
        </div>
    </div>
</div>
