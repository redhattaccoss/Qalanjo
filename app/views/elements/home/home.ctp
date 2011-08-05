<div class="logo left">
</div>
<div class="login-space right" id="login-space">
    <div class="login">
   	 	<?php 
   	 		echo $this->element("home/login");
   	 	
   	 	?>
    </div>
    <div class="login-button">
        <button id="login-button" class="button-login left">
            Member Login  <?php 
                	echo $html->image("/css/img/blue/homepage/triangle.png")?>
        </button>
    </div>
</div>
<div class="signup-form left">
    <div class="right sign-up-header clear">
        <div class="signup-slice-corner right">
        </div>
        <div class="signup-repeat-header right">
            <h2 class="left">Free to Review Your Matches</h2>
        </div>
        <div class="signup-slice-corner-left right">
        </div>
    </div>
    <div class="signup-form-content left">
    	<?php echo $form->create("Member", array("url"=>"signup", "id"=>"signup-form"))?>	
            <fieldset class="left">
                <dl class="left">
                    <dt class="left">
                        <label>
                            First Name: 
                        </label>
                    </dt>
                    <dd class="left">
                    	<?php 
							echo $form->input("firstname", array("class"=>"text", "div"=>false, "label"=>false));
						?>
                        <div class="required"></div>
                    </dd>
                    <dt class="left clear">
                        <label>
                            Last Name: 
                        </label>
                    </dt>
                    <dd class="left">
                        <?php 
							echo $form->input("lastname", array("class"=>"text", "div"=>false, "label"=>false));
						?>
                        
                        <div class="required"></div>
                    </dd>
                    <dt class="left clear">
                        <label>
                            Email: 
                        </label>
                    </dt>
                    <dd class="left">
                    	<?php 
							echo $form->input("email", array("class"=>"text", "div"=>false,"id"=>"email", "label"=>false));
						?>
						<span class="footnote">Note: Your email is
                            used to log back in</span>
                        <div class="required special"></div>
                    </dd>
                    <dt class="left clear">
                        <label>
                            Confirm Email: 
                        </label>
                    </dt>
                    <dd class="left">
                        <?php echo $form->input("confirm_email", array("id"=>"confirm_email", "div"=>false, "label"=>false))?>
                        <div class="required">
                        </div>
                        
                    </dd>
                    <dt class="left clear">
                        <label>
                            Password: 
                        </label>
                    </dt>
                    
                    <dd class="left">
                    	<?php echo $form->input("password", array("id"=>"password","type"=>"password", "div"=>false, "label"=>false, "selected"=>"", "value"=>""))?>
                       <span class="footnote">Must be atleast 5 characters</span>
                        <div class="required special">
                        </div>
                    </dd>
                    <dt class="left clear">
                        <label>
                            Confirm Password: 
                        </label>
                    </dt>
                    
                    <dd class="left">
                    	<?php echo $form->input("confirm_password", array("type"=>"password", "div"=>false, "label"=>false, "selected"=>"", "value"=>""))?>
                        <label class="required">
                        </label>
                    </dd>
                    
                    
                    <dt class="left clear">
                        <label class="gender first">
                            I'm a:
                        </label>
                    </dt>
                    <dd class="left gender">
                    	<?php 
							echo $form->input("gender_id", array("class"=>"gender", "type"=>"select", "options"=>$genders,"div"=>false, "label"=>false));
						?>
                    </dd>
                    <dt class="left gender-label">
                        <label class="gender first">
                            Seeking: 
                        </label>
                    </dt>
                    <dd class="left gender">
                        <?php 
							echo $form->input("looking_for_id", array("class"=>"gender", "type"=>"select", "options"=>$seeking,"div"=>false, "label"=>false));
							
						?>
                    </dd>
                    <dt class="left clear">
                        <label>
                            Birthday: 
                        </label>
                    </dt>
                    <dd class="left birthdate">
                        <?php 
							echo $form->input("MemberProfile.birthdate", array("type"=>"date","minYear"=>date("Y")-50, "maxYear"=>date("Y")-18 ,"div"=>false, "label"=>false));
							
						?>
                    </dd>
                    <dt class="left clear">
                        <label>
                            How did you hear about us?:
                        </label>
                    </dt>
                    <dd class="left">
                        <?php 
							echo $form->input("idea_id", array("class"=>"findEH", "id"=>"findEH", "type"=>"select", "options"=>$ideas, "div"=>false, "selected"=>"-1","label"=>false));
						?>
                        <div class="required">
                        </div>
                    </dd>
                </dl>
                <button type="submit" class="left" id="find-my-matches"></button>
            </fieldset>
        <?php echo $form->end()?>
    </div>
</div>
<div class="right why-qalanjo">
    <h2>Why Qalanjo</h2>
</div>
<div class="why-qalanjo-pointer right">
</div>
<div class="left item-features clear">
    <div class="item-feature item-feature-first left">
        <div class="left item-shadow item-shadow-left">
        </div>
        <div class="left item-content">
            <div class="left content">
                <h3 class="left">Find the Perfect Person for You</h3>
                 <?php 
                	echo $html->image("/css/img/blue/homepage/paper.png", array("alt"=>"", "class"=>"right clear paper"))
                	
                ?>
                <p class="left clear">
                    Sign up and register in our website, complete the
                    relationship questionnaire and create your own personal profile
                    absolutely free.
                </p>
            </div>
        </div>
        <div class="left item-shadow item-shadow-right">
        </div>
    </div>
    <div class="item-feature left">
        <div class="left item-shadow item-shadow-left">
        </div>
        <div class="left item-content">
            <div class="left content">
                <h3 class="left">Meet People of Your Own Kind</h3>
                 <?php 
                	echo $html->image("/css/img/blue/homepage/woman.png", array("alt"=>"", "class"=>"right clear woman"))
                	
                ?>
                <p class="left clear">
                    Since Qalanjo is an exclusive dating site for
                    Somali people, you are assured to find the perfect person..
                </p>
            </div>
        </div>
        <div class="left item-shadow item-shadow-right">
        </div>
    </div>
    <div class="item-feature left">
        <div class="left item-shadow item-shadow-left">
        </div>
        <div class="left item-content">
            <div class="left content">
                <h3 class="left search">Search for Somali Singles Online</h3>
                <?php 
                	echo $html->image("/css/img/blue/homepage/somali.png", array("alt"=>"", "class"=>"right clear somali"))
                	
                ?>
                <p class="left clear">
                    This site is highly useful especially to Somali
                    singles who are very busy in their respective careers and professions
                    which..
                </p>
            </div>
        </div>
        <div class="left item-shadow item-shadow-right">
        </div>
    </div>
    <div class="item-feature left">
        <div class="left item-shadow item-shadow-left">
        </div>
        <div class="left item-content">
            <div class="left content">
                <h3 class="left search">Find True Compatibility Today</h3>
                <?php 
                	echo $html->image("/css/img/blue/homepage/mansearch.png", array("alt"=>"", "class"=>"right clear mansearch"))
                	
                ?>
                <p class="left clear">
                    Isn't it time you experienced the joy of falling
                    in love with someone who sees you, loves you, and accepts you for who
                    you are?
                </p>
            </div>
        </div>
        <div class="left item-shadow item-shadow-right">
        </div>
    </div>
</div>
