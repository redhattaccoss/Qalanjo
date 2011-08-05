<?php echo $form->create("Member", array("url"=>"login", "class"=>"left", "id"=>"loginForm"))?>
            <fieldset class="left">
                <dl class="left">
                    <dt class="left">
                        Email:
                    </dt>
                    <dd class="left clear">
                    	<?php 
							echo $form->input("Member.email", array("div"=>false,
												 "label"=>false, "class"=>"txt", "maxlength"=>50, "id"=>"email-login"));
						?>
                    </dd>
                    <dt class="left clear">
                        Password:
                    </dt>
                    <dd class="left clear">
                        <?php 
							echo $form->input("Member.password", array("div"=>false, "type"=>"password",
												 "label"=>false, "class"=>"txt", "maxlength"=>50, "id"=>"password-login", "value"=>""));
						?>
                    </dd>
                </dl>
                <button class="right logged-button clear" type="submit"></button>
            </fieldset>
 	<div class="right small small-links clear">
		<?php echo $html->link("I can't access my account", "/members/forgot_password")?>
		| <a href="#">Help</a>
	</div>
<?php echo $form->end();?>