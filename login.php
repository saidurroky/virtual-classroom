<?php 
    include 'inc/header.php';
?>		
              
<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

        $userlogin = $user -> userLogin($_POST);
    }
?>
		
		
        <!--login style-->
        <header id="home" class="home">
            <div class="overlay-fluid-block">
                <div class="container text-center">
                    <div class="row">
                        <div class="home-wrapper">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="home-content">
                                    <h1>Log In To V-Classroom</h1>
									<?php
										if(isset($userlogin)){
											echo $userlogin;
										}
									?>
									<form action="" id="formid" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="home-contact">
                                                <div class="input-group">
                                                    <input type="email" name="email" class="form-control" placeholder="Enter your email address">												   </div><!-- /input-group -->
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="home-contact">
                                                <div class="input-group">
													<input type="password" name="password" class="form-control" placeholder="Enter your password ">
                                                    <input type="submit" name="login" class="form-control" value="LOG IN">                                                 
                                                </div><!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>			
            </div>
        </header>

		<?php
   
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){

				$userReg = $user -> userRegistration($_POST);
			}
		?>
		
		
        <section id="register" class="contact sections">
            <div class="container">
                <div class="row">
                    <div class="main_contact whitebackground">
                        <div class="head_title text-center">
                            <h2>Register To V-Classroom</h2>
							<p>If you are not registered user, please register here.</p>
							<?php
								if(isset($userReg)){
									echo $userReg;
								}
							?>
                        </div>
                        <div class="contact_content">
						<form action="" method="post" id="formid">
                            <div class="col-md-6">
                                <div class="single_left_contact">
                                    

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="fname" placeholder="first name" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="lname" class="form-control" name="lname" placeholder="last name" required="">
                                        </div>
									
										<div class="form-group">
                                            <select class="span6 " data-placeholder="Choose a Category" tabindex="1" name="role">
												<option value="">Select...</option>												
												<option value="1">Student</option>
												<option value="2">Teacher</option>
											</select>
                                        </div>

                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single_left_contact">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="email" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="password" required="">
                                        </div>  
											
                                        <div class="center-content">
                                            <input type="submit" name="register" value="Submit" class="btn btn-default">
                                        </div>
                                </div>
                            </div>
							 </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of Contact Section -->


        <section id="forget_pass" class="sections footer-menu">
            <div class="container">
                <div class="row">
                    <div class="footer-menu-wrapper">
						  <div class="head_title text-center">
                            <h2>Forget Password</h2>
							<p>If you forget your password, please fill up the form here.</p>
                        </div>
                        <div class="contact_content">
						
						<form action="login.php" method="post" id="formid">
                            <div class="col-md-6">
                                <div class="single_left_contact">
                                    

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="new password" required="">
                                        </div>


                                        <div class="center-content">
                                            <input type="submit" value="Submit" class="btn btn-default">
                                        </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single_left_contact">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="your email" required="">
                                        </div>
                                      
                                </div>
                            </div>
							 </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>


<?php
	include 'inc/footer.php';
?>