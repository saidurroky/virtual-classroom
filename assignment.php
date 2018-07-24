<?php
include ("inc/header.php");

?>

<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_assignment'])){

        $addAssignment = $assignment -> addAssignment($_POST);
    }
?>
	
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Create Assignment</h2>
							<p>You can add assignment topic for your classroom.</p>
							<?php
										if(isset($addAssignment)){
											echo $addAssignment;
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
                                            <textarea class="form-control" name="asn_topic" rows="8" placeholder="Assignment Topic"></textarea>
                                        </div>
										<div class="form-group">
											<input type="text" class="form-control" name="deadline" placeholder="Deadline(exp. 2017-07-26)">
									    </div>
										<div class="form-group">
											<input type="hidden" class="form-control" name="class_id" value="<?php echo Session::get('class_id') ;?>">
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
	

<?php
	 if(isset($_GET['delassignment'])){

        $id = $_GET['delassignment'];
        $delassignment = $assignment ->delassignment($id);
   	 }
?>

	
		<div class="container">
				<div class="row">
					
					
					<div class="col-md-12">
					<h4>Assignment Datatable</h4>
					<div class="table-responsive">

							
						  <table id="mytable" class="table table-bordred table-striped">
							   
							   <thead>
							   <th>Serial No.</th>
								<th>Handout</th>
								<th>Deadline</th>
								<th>Edit</th> 
								<th>View Response</th>
								  
								   <th>Delete</th>
							   </thead>
				<tbody>


                          
							<?php
								$class_id = Session::get("class_id");
								$getassignment = $assignment ->getassignment($class_id);

								if($getassignment){
									$i =0;
									while ($result = $getassignment ->fetch_assoc()) {
									$i++;
							?>	
	
		
				<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $result['asn_topic']; ?></td>
				<td><?php echo $result['deadline']; ?></td>
				<td>
					<a href="assignment_replay.php?id=<?php echo $result['assignment_id'];?>">
					<p data-placement="top" data-toggle="tooltip" title="Give assignment">
					<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
					<span class="glyphicon glyphicon-pencil"></span></button></p></a>
				</td>
				<td>
					<a href="assignment_view.php?id=<?php echo $result['assignment_id'];?>">
					<p  title="view all response">
					<button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-search"></span></button></p></a>
				</td>
				<td>
					<a onclick='return confirm("Are you sure to delete")' href="?delassignment=<?php echo $result['assignment_id']; ?>"><p data-placement="top" data-toggle="tooltip" title="Delete">
					<button class="btn btn-danger btn-xs" >
					<span class="glyphicon glyphicon-trash"></span></button></p>
				</td>
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