<?php 
	$html->css(array("blue/login"), "stylesheet", array("inline"=>false));
	$javascript->link("blue/members/login", false);
	if (isset($error)){
		$error = 1;
	}else{
		$error = 0;
	}
	$html->scriptBlock("
		var error = $error;
	", array("inline"=>false));
?>
<div class="login-block left">
	<div class="error-block-main left">
		<div class="error-block left">
			<div class="error-block-container left"></div>
			<div class="left icon">
				<?php echo $html->image("/css/img/blue/login/error.png", array("class"=>"left"))?>
			</div>
			<div class="left message">
				<strong class="left">INVALID EMAIL OR PASSWORD.</strong>
				<p class="left clear">Your email and/or password you entered is incorrect. Please try again (make sure your caps lock is off).</p>
			</div>	
			<div class="right close-error-block clear">
				<button class="close-error"></button>
			</div>
		</div>
	</div>
	<div class="content-block left">
		<div class="signupnow left">
			<button class="buttonsignup">
			</button>
		</div>
		<div class="signupnow right">
			<h1 class="signupnow">Qalanjo helps you to find your match.</h1>
		</div>
		<div class="errologin-cap left">
			<h2> Login</h2>
		
			<div class="shadow">
			</div>
		</div>
		<div class="left clear orange-side">
		</div>
		<div class="left errologin-main-container">
			<?php 
				echo $form->create("Member", array("id"=>"login", "url"=>"/members/login"))
			?>
				<div class="errologin-form">
					<h3 class="required">
					
					</h3>
					<ul class="choices">
						<li>
							<div>
								<dl class="choice">
									<dt class="label">
										Username/Email
									</dt>
									<dd>
										<?php echo $form->input("Member.email", array("class"=>"email", "div"=>false, "label"=>false))?>
									</dd>
								</dl>
							</div>
						</li>
						<li>
							<div>
								<dl class="choice">
									<dt class="label">
										Password
									</dt>
									<dd>
										<?php echo $form->input("Member.password", array("class"=>"email", "div"=>false, "label"=>false, "value"=>""))?>
									</dd>
								</dl>
							</div>
						</li>
						<li>
							<div>
								<dl class="choice">
									<dt class="labelforgot">
										<?php 
											echo $html->link("Forgot Password?", "/members/forgot_password");
										?>
									</dt>
		
								</dl>
							</div>
						</li>
					</ul>
				</div>
				<div class="button-set">
					<div class="left">
						<p class="orsignup right">
							<?php echo $html->link("Sign up for Qalanjo", "/", array("class"=>"login-link"))?>
						</p>
					</div>
					<div class="right">
						<button class="buttonclear" type="submit">
						</button>
		
					</div>
				</div>
			<?php echo $form->end();?>
		</div>
		<div class="left orange-side">
		</div>
		<div class="boxshadowing">
		</div>
	</div>
</div>