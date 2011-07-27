<?php echo $form->create("Members", array("url"=>"/admin/members/login"))?>
	<p class="titlehome">
		Login
	</p>
	<div class="headerline">
	</div>
	<div class="loginbox">
		<p>
			Username
		</p>
		<?php echo $form->input("Member.email", array("div"=>false, "label"=>false, "class"=>"txtlogin"))?>
		<p>
			Password
		</p>
		<?php 
			echo $form->input("Member.password", array("div"=>false, "label"=>false, "class"=>"txtlogin"));
		?>
		<div class="button-set">
			<button class="left" type="submit">
			</button>
		</div>
	</div>
	<p class="forgothomep">
		Forgot Password?
	</p>
<?php echo $form->end()?>