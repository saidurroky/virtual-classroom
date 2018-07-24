<?php
include ("inc/header.php");

?>

<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_class'])){

        $addClass = $class -> addClass($_POST);
    }
?>
	
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Add Classroom</h2>
							<p>You can add classroom bye providing following info.</p>
							<?php
										if(isset($addClass)){
											echo $addClass;
										}
									?>
                        </div>
						
                        <div class="contact_content">
						<form action="" method="post" id="formid">
                            <div class="col-md-6">
                                <div class="single_left_contact">
										 <div class="form-group">
                                            <input type="text" class="form-control" name="userid" value="<?php echo Session::get('id') ;?>">
                                        </div>  

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="classname" placeholder="class name" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="coursename" placeholder="course name" required="">
                                        </div>
									

                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single_left_contact">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="coursecode" placeholder="course code" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="classcode" placeholder="class code" required="">
                                        </div>  
											
                                        <div class="center-content">
                                            <input type="submit" name="add_class" value="Submit" class="btn btn-default">
                                        </div>
                                </div>
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