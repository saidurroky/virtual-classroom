<?php
include ("inc/header.php");

?>

<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_assignment'])){

        $addAssignmentReplay = $assignment -> addAssignmentReplay($_POST,$_FILES);
    }
?>
	
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Give Assignment</h2>
							<?php
										if(isset($addAssignmentReplay)){
											echo $addAssignmentReplay;
										}
									?>
                        </div>
						
                        <div class="contact_content">
						<form action="" method="post" id="formid" enctype="multipart/form-data" >
                            <div class="col-md-12">
                                <div class="single_left_contact">
										 <div class="form-group">
                                            <input type="hidden" class="form-control" name="userid" value="<?php echo Session::get('id') ;?>">
                                        </div>  
									<?php
										 if(isset($_GET['id']) || $_GET['id'] == NULL){
											$id = $_GET['id'] ;
											$get_singel_assignment = $assignment -> get_singel_assignment($id);	
											}
											if($get_singel_assignment){
												while ($result = $get_singel_assignment ->fetch_assoc()) {
										 ?>
										 <div class="form-group">
											<input type="hidden" class="form-control" name="assignment_id" value="<?php echo $result['assignment_id']; ?>">
                                        </div>
                                        <div class="form-group">
											<input type="text" class="form-control" name="asn_topic" value="<?php echo $result['asn_topic']; ?>">
                                        </div>
										<div class="form-group">
											<textarea class="form-control" name="replay_assignment" rows="12" placeholder="write assignment here"></textarea>
									    </div>
										<div class="form-group">
											<input type="file" class="form-control" name="image" value="">
                                        </div>
										<div class="form-group">
											<input type="hidden" class="form-control" name="class_id" value="<?php echo Session::get('class_id') ;?>">
									    </div>
										<div class="form-group">
											<input type="text" class="form-control" name="name" value="<?php echo Session::get('fname') ;?>">
									    </div>
										<div class="center-content">
                                            <input type="submit" name="add_assignment" value="Submit" class="btn btn-default">
                                        </div>                               
                                </div>
                            </div>
                            
							 </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of Contact Section -->
<?php } } ?>
<?php
include ("inc/footer.php");

?>