<?php
include ("inc/header.php");

?>
<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['join_class'])){

        $joinClass = $class -> joinClass($_POST);
    }
?>

        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Join Classroom</h2>
							<p>You can join any classroom by giving class code.</p>
							<?php
								if(isset($joinClass)){
									echo $joinClass;
								}
							?>
                        </div>
						
                        <div class="contact_content">
						<form action="" method="post" id="formid">
						<div class="col-md-3">
						</div>
                            <div class="col-md-6">
                                <div class="single_left_contact">
										 <div class="form-group">
                                            <input type="hidden" class="form-control" name="userid" value="<?php echo Session::get('id') ;?>">
                                        </div>  
										<div class="form-group">
                                            <input type="text" class="form-control" name="name" value="<?php echo Session::get('fname') ;?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="classcode" placeholder="class code" required="">
                                        </div>  
											
                                        <div class="center-content">
                                            <input type="submit" name="join_class" value="Submit" class="btn btn-default">
                                        </div>   
                                </div>
                            </div>
                            <div class="col-md-3">
						</div>
							 </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of Contact Section -->

<?php
include ("inc/footer.php");
?>