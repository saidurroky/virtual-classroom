<?php
include ("inc/header.php");

?>

<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_handout'])){

        $addHandout = $handout -> addHandout($_POST);
    }
?>
	
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Create Handout</h2>
							<p>You can add Handout for your classroom.</p>
							<?php
										if(isset($addHandout)){
											echo $addHandout;
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
                                            <textarea class="form-control" name="handout" rows="8" placeholder="Handout Message"></textarea>
                                        </div>
										<div class="form-group">
                                        <select id="select" name="class_id">
											<option>Select Category</option>
											<?php
												$id = Session::get("id");
												$class_id = $user ->getclass_id($id);
												if($class_id){
													while ($result = $class_id ->fetch_assoc()) {
											?>
											<option value="<?php echo $result['class_id'];?>"><?php echo $result['classname'];?></option>

											  <?php      } }  ?>

										</select>
									</div>
										<div class="center-content">
                                            <input type="submit" name="add_handout" value="Submit" class="btn btn-default">
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
	 if(isset($_GET['delhandout'])){

        $id = $_GET['delhandout'];
        $delhandout = $handout ->delhandout($id);
   	 }
?>

	
		<div class="container">
				<div class="row">
					
					
					<div class="col-md-12">
					<h4>Handout Datatable</h4>
					<div class="table-responsive">

							
						  <table id="mytable" class="table table-bordred table-striped">
							   
							   <thead>
							   <th>Serial No.</th>
								<th>Handout</th>
								 
								
								  
								   <th>Delete</th>
							   </thead>
				<tbody>


                          
							<?php
								$class_id = Session::get("class_id");
								$gethandout = $handout ->gethandout($class_id);

								if($gethandout){
									$i =0;
									while ($result = $gethandout ->fetch_assoc()) {
									$i++;
							?>	
	
		
				<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $result['handout']; ?></td>
				
				
				<td><a href="?delhandout=<?php echo $result['handout_id']?>"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
				</tr>
			
			
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

				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
				  <div class="modal-dialog">
				<div class="modal-content">
					  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
					<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
				  </div>
					  <div class="modal-body">
				   
				   <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
				   
				  </div>
					<div class="modal-footer ">
					<button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
				  </div>
					</div>
				<!-- /.modal-content --> 
				</div>
				  <!-- /.modal-dialog --> 
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