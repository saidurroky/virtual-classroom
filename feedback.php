<?php
include ("inc/header.php");

?>

<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addfeedback'])){

        $addfeedback = $feedback -> addfeedback($_POST);
    }
?>
	
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Give Feedback</h2>
							
							<?php
										if(isset($addfeedback)){
											echo $addfeedback;
										}
									?>
                        </div>
						
                        <div class="contact_content">
						<form action="" method="post" id="formid">
                            <div class="col-md-12">
                                <div class="single_left_contact">
										 <div class="form-group">
                                            <input type="hidden" class="form-control" name="userid" value="<?php echo Session::get('id') ;?>">
                                        </div>  
										<div class="form-group">
											<select id="select" name="star">
												<option>Select......</option>
												<option value="5 star">*****(5 star)</option>
												<option value="4 star">****(4 star)</option>
												<option value="3 star">***(3 star)</option>
												<option value="2 star">**(2 star)</option>
												<option value="1 star">*(1 star)</option>
											    

											</select>
										</div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="feedback" rows="8" placeholder="feedback Message"></textarea>
                                        </div>
										<div class="form-group">
                                            <input type="hidden" class="form-control" name="class_id" value="<?php echo Session::get('class_id') ;?>">
									    </div>
										<div class="center-content">
                                            <input type="submit" name="addfeedback" value="Submit" class="btn btn-default">
                                        </div>                               
                                </div>
                            </div>
                            
							 </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of Contact Section -->
	

		<div class="container">
				<div class="row">
					
					
					<div class="col-md-12">
					<h4>Feedback Datatable</h4>
					<div class="table-responsive">

							
						  <table id="mytable" class="table table-bordred table-striped">
							   
							   <thead>
							   <th>Serial No.</th>
								<th>Stars</th>
								<th>Feedback Message</th>
							   </thead>
				<tbody>


                          
							<?php
								$class_id = Session::get("class_id");
								$getfeedback = $feedback ->getfeedback($class_id);

								if($getfeedback){
									$i =0;
									while ($result = $getfeedback ->fetch_assoc()) {
									$i++;
							?>	
	
		
				<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $result['star']; ?></td>
				<td><?php echo $result['feedback']; ?></td>
			<?php } } ?>

				</tbody>
					
				</table>

				<div class="clearfix"></div>
				<ul class="pagination pull-right">
				<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
				</ul>
							
						</div>
						
					</div>
				</div>
				</div>


<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>

<?php
include ("inc/footer.php");
?>