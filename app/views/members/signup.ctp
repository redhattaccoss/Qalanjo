<div class="wrapper-container">
	<div class="container">
		<div class="shadowingleft right">
		</div>
		<div class="maincontainer right">
			<div class="logo left">
			</div>
			<div class="login-space float-right" id="login-space">
				<div class="login">
					<?php echo $form->create("Member", array("url"=>"login", "class"=>"left", "id"=>"loginForm"))?>
						<fieldset class="left">
							<dl class="left">
								<dt class="left">
									Email:
								</dt>
								<dd class="left clear">
									<?php 
										echo $form->input("Member.email", array("div"=>false,
															 "label"=>false, "class"=>"txt login-textbox", "maxlength"=>50, "id"=>"email-login"));
									?>
								</dd>
								<dt class="left clear">
									Password:
								</dt>
								<dd class="left clear">
									 <?php 
										echo $form->input("Member.password", array("div"=>false, "type"=>"password",
															 "label"=>false, "class"=>"txt login-textbox", "maxlength"=>50, "id"=>"password-login", "value"=>""));
									?>
								</dd>
							</dl>
                            <button type="submit" class="blue-button"></button>
						</fieldset>
					<?php echo $form->end()?>
				</div>
				<div class="login-button">
					<button id="login-button" class="button-login">
						Member Login
						<?php echo $html->image("/css/img/home/home/triangle.png", array("alt"=>""))?>
					</button>
				</div>
			</div>
			<div class="signup-form float-left">
				<div class="float-right sign-up-header">
					<div class="signup-slice-corner float-right">
					</div>
					<div class="signup-repeat-header float-right">
						<h2 class="float-left"> Free to Review Your Matches</h2>
					</div>
					<div class="signup-slice-corner-left float-right">
					</div>
				</div>
				<div class="signup-form-content float-left">
					<?php echo $form->create("Member", array("url"=>"signup", "id"=>"signup-form"))?>
						<fieldset class="float-left">
							<dl class="float-left">
								<dt class="float-left">
									<label>
										First Name:
									</label>
								</dt>
								<dd class="float-left">
									<?php 
										echo $form->input("firstname", array("class"=>"text", "div"=>false, "label"=>false));
									?>
									<div class="required">
									</div>
								</dd>
								<dt class="float-left clear">
									<label>
										Last Name:
									</label>
								</dt>
								<dd class="float-left">
									<?php 
										echo $form->input("lastname", array("class"=>"text", "div"=>false, "label"=>false));
									?>
									<div class="required">
									</div>
								</dd>
								<dt class="float-left clear">
									<label>
										Email:
									</label>
								</dt>
								<dd class="float-left">
									<?php 
										echo $form->input("email", array("class"=>"text", "div"=>false,"id"=>"email", "label"=>false));
									?>
									<span class="footnote">Note:
										Your email is used to log back in</span>
									<div class="required">
									</div>
								</dd>
								<dt class="float-left clear">
									<label>
										Confirm Email:
									</label>
								</dt>
								<dd class="float-left">
									<?php echo $form->input("confirm_email", array("id"=>"confirm_email", "div"=>false, "label"=>false))?>
									<div class="required">
                        			</div>
								</dd>
								<dt class="float-left clear">
									<label>
										Password:
									</label>
								</dt>
								<dd class="float-left">
									<input type="password" name="data[Member][password]" id="password1" />
									<span class="footnote">Must
										be at least 5 characters</span>
									<div class="required">
                       				</div>
								</dd>
								 <dt class="float-left clear">
                                    <label>
                                        Confirm Password:
                                    </label>
                                </dt>

                                <dd class="float-left">
                                	<?php echo $form->input("confirm_password", array("type"=>"password", "div"=>false, "label"=>false, "selected"=>"", "value"=>""))?>
                                    <div class="required">
                                    </div>
                                </dd>
								
								<dt class="float-left clear">
									<label for="gender" class="gender first">
										I'm a:
									</label>
								</dt>
								<dd class="float-left gender">
									<?php 
										echo $form->input("gender_id", array("class"=>"gender select-mf", "type"=>"select", "options"=>$genders,"div"=>false, "label"=>false));
									?>
								</dd>
								<dt class="float-left gender-label">
									<label class="gender first">
										Seeking:
									</label>
								</dt>
								<dd class="float-left gender">
									<?php 
										echo $form->input("looking_for_id", array("class"=>"gender select-mf2", "type"=>"select", "options"=>$seeking,"div"=>false, "label"=>false));
										
									?>
								</dd>
								<dt class="float-left clear">
                                    <label>
                                        Birthday:
                                    </label>
                                </dt>
                                <dd class="float-left">
                                	  <?php 
										echo $form->input("MemberProfile.birthdate", array("type"=>"date","minYear"=>date("Y")-50, "maxYear"=>date("Y")-18 ,"div"=>false, "label"=>false));
										
									?>
                                </dd>
								<dt class="float-left clear">
									<label>
										How did you hear about us?:
									</label>
								</dt>
								<dd class="float-left">
									 <?php 
										echo $form->input("idea_id", array("class"=>"findEH how-didyouhear", "type"=>"select", "options"=>$ideas, "div"=>false, "selected"=>"-1","label"=>false));
									?>
									<div class="required">
									</div>
								</dd>
							</dl>
							<button type="submit" class="left">
							</button>
						</fieldset>
					<?php echo $form->end()?>
				</div>
			</div>
			<div class="float-right why-qalanjo">
				<h2>
				WHY
				<span>Q</span>ALANJO
				</h2>
			</div>
			<div class="left item-features clear">
				<div class="float-couple clear">
				</div>
				<div class="item-feature-first float-left">
					<div class="float-left item-content">
						<h3 class="float-left"> No man is an island</h3>
						<?php echo $html->image("/css/img/home/home/couple1.png", array("alt"=>"Qalanjo Dating Site", "class"=>"float-left"))?>
						<p class="left clear">
							It is but natural for humans to seek for people to whom they could share their life
							with or perhaps, need other people's company to avoid times of loneliness and abandonment.
						</p>
					</div>
					<div class="item-shadow-bottom">
					</div>
				</div>
				<div class="float-left item-content-message">
					<p class="float-left clear">
						Motivated by our founder's (Dr. Hashi) desire to build up relationships among young
						Somalis, Qalanjo continues to be an avenue of love to all Somali individuals out
						there. If you are looking for a special relationship, or could just be friendship
						that you are after, Qalanjo is definitely the right choice for you.
					</p>
				</div>
			</div>
			<div class="left-arrow">
				<button type="submit" class="button-arrow">
				</button>
			</div>
			<div class="picture-box">

				<ul>
					<li>
						<div class="photo-thumbnail">
							<?php 
								echo $html->image("dummy/n1.jpg", array("alt"=>""))
							?>
						</div>
					</li>
					<li>
						<div class="photo-thumbnail">
							<?php 
								echo $html->image("dummy/n2.jpg", array("alt"=>""))
							?>
						</div>
					</li>
					<li>
						<div class="photo-thumbnail">
							<?php 
								echo $html->image("dummy/n3.jpg", array("alt"=>""))
							?>
						</div>
					</li>
					<li>
						<div class="photo-thumbnail">
							<?php 
								echo $html->image("dummy/n4.jpg", array("alt"=>""))
							?>
						</div>
					</li>
					<li>
						<div class="photo-thumbnail">
							<?php 
								echo $html->image("dummy/n5.jpg", array("alt"=>""))
							?>
						</div>
					</li>
				</ul>

			</div>
			<div class="right-arrow">

				<button type="submit" class="button-arrow2">
				</button>
			</div>
			<?php echo $this->element("home/footer")?>
		</div>
		<div class="shadowingright right">
		</div>
	</div>
</div>