<?php
include ("inc/header.php");

?>
<?php
	 if(isset($_GET['id']) || $_GET['id'] == NULL){
		$id = $_GET['id'] ;
		$get_singel_assignment_replay = $assignment -> get_singel_assignment_replay($id);	
		}
	if($get_singel_assignment_replay){
		while ($result = $get_singel_assignment_replay ->fetch_assoc()) {
?>
<?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $marks = $_POST['marks'];

        $singel_assignment_replay_mark = $assignment -> singel_assignment_replay_mark($marks,$id);
    }
    
?>
	
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Assignment</h2>
							<?php
										if(isset($singel_assignment_replay_mark)){
											echo $singel_assignment_replay_mark;
										}
									?>
                        </div>
						
                        <div class="contact_content">
						
                            <div class="col-md-12">
                                <div class="single_left_contact">
										
									
										 <div class="form-group">
											<input type="text" class="form-control"  placeholder="<?php echo $result['name']; ?>">
                                        </div>
                                        <div class="form-group">
											<input type="text" class="form-control"  placeholder="<?php echo $result['asn_topic']; ?>">
                                        </div>
										<div class="form-group">
											<textarea class="form-control" rows="12" placeholder=""><?php echo $result['replay_assignment']; ?></textarea>
									    </div>
										<div class="form-group">
											<input type="text" class="form-control"  placeholder="<?php echo $result['marks']; ?>">
									    </div>                
                                </div>
                            </div>
                            
							
                        </div>
						
						 <div class="contact_content">
						 
						<form action="" method="post" id="formid" >
                            <div class="col-md-12">
                                <div class="single_left_contact">
								<h3 style="color:red">Give marks</h3>
										
										<div class="form-group">
											<input type="text" class="form-control" name="marks" placeholder="give marks">
									    </div>
										<div class="center-content">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-default">
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