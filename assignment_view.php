<?php
include ("inc/header.php");

?>


	<section id="register" class="service2 sections lightbg">
		<div class="container">
				<div class="row">
					
					
					<div class="col-md-12">
					<h4>Assignment Datatable</h4>
					<div class="table-responsive">

							
						  <table id="mytable" class="table table-bordred table-striped">
							   
							   <thead>
							   <th>Serial No.</th>
								<th>Student Name</th>
								<th>Topic Title</th>
								<th>Assignment</th>
								<th>View Full Assignment and Give Marks</th> 
								
							   </thead>
				<tbody>

<?php
 if(isset($_GET['id']) || $_GET['id'] == NULL){
	$id = $_GET['id'] ;
	$get_assignment_response = $assignment -> get_assignment_response($id);	
	}
	if($get_assignment_response){
			$i =0;
		while ($result = $get_assignment_response ->fetch_assoc()) {
		$i++;
 ?>
                          
				<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $result['name']; ?></td>
				<td><?php echo $result['asn_topic']; ?></td>
				<td><?php echo $fm ->textshorten($result['replay_assignment'], 60) ;?> </td>
				<td>
					<a href="assignment_marks.php?id=<?php echo $result['assignmentReplay_id'];?>">
					<p data-placement="top" data-toggle="tooltip" title="view assignment and give marks">
					<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
					<span class="glyphicon glyphicon-pencil"></span></button></p></a>
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
</section>


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