
<h1 class="change">User Account</h1>
<div class="change-password-cap left">
	<h2> Create New Password</h2>
	<p>
		Password must be 8 or more characters in lentgth.
	</p>
	<div class="shadow">
	</div>
</div>
<div class="left clear orange-side">
</div>
<div class="left change-main-container">
	<?php echo $form->create("Member", array("url"=>"/members/changepassword"))?>
		<div class="change-form">
			<h3 class="required">
			Sorry, there were problems with your input.
			</h3>
			<ul class="choices">
				
				<li>
					<div>
						<dl class="choice">
							<dt class="label">
								New Password
							</dt>
							<dd>
								<?php echo $form->input("Member.password", array("class"=>"email", "type"=>"password","div"=>false, "label"=>false, "value"=>""))?>
								
							</dd>
						</dl>
					</div>
				</li>
				<li>
					<div>
						<dl class="choice">
							<dt class="label">
								Confirm Password
							</dt>
							<dd>
								<?php echo $form->input("Member.confirm_password", array("class"=>"email", "type"=>"password","div"=>false, "label"=>false, "value"=>""))?>
							</dd>
						</dl>
					</div>
				</li>
			</ul>
		</div>
		<div class="button-set">
			<div class="right">
				<button class="buttonclear" type="submit">
				</button>
				<button class="buttonsave">
				</button>
			</div>
		</div>
	<?php echo $form->end()?>
</div>
<div class="left orange-side">
</div>