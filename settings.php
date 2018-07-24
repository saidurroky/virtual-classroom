<?php
include ("inc/header.php");

?>

<?php
	if(isset($_GET['aid'])){
		$accptId = $_GET['aid'];
		$acceptstudent = $settings ->acceptstudent($accptId);
	}
	if(isset($_GET['did'])){
		$declId = $_GET['did'];
		$declinestudent = $settings ->declinestudent($declId);
	}
	
?>
	<section id="register" class="service2 sections lightbg">
		<div class="container">
				<div class="row">
					
					
					<div class="col-md-12">
					<h4>Student Request To Join Classroom</h4>
					<div class="table-responsive">

							
						  <table id="mytable" class="table table-bordred table-striped">
							   
							   <thead>
							   <th>Serial No.</th>
								<th>Student Name</th>
								<th>Action</th>
								
								
							   </thead>
				<tbody>

<?php
	$code = Session::get('classcode');
	$get_student = $settings -> get_student($code);	
	if($get_student){
			$i =0;
		while ($result = $get_student ->fetch_assoc()) {
		$i++;
 ?>
                          
				<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $result['name']; ?></td>
				
				<td>
					<a onclick="return confirm('Are you sure to Accept')" href="?aid=<?php echo $result['jclass_id']; ?>">Accept</a>  ||  
					<a onclick="return confirm('Are you sure to Decline')" href="?did=<?php echo $result['jclass_id']; ?>">Decline</a>
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


  <section id="contact" class="contact sections">
		<div class="container">
				<div class="row">
					
					
					<div class="col-md-12">
					<h4>Student Of Your Classroom</h4>
					<div class="table-responsive">

							
						  <table id="mytable" class="table table-bordred table-striped">
							   
							   <thead>
							   <th>Serial No.</th>
								<th>Student Name</th>
								<th>Action</th>
								
								
							   </thead>
				<tbody>

<?php
	$code = Session::get('classcode');
	$get_all_student = $settings -> get_all_student($code);	
	if($get_all_student){
			$i =0;
		while ($result = $get_all_student ->fetch_assoc()) {
		$i++;
 ?>
                          
				<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $result['name']; ?></td>
				
				<td>
					 
					<a onclick="return confirm('Are you sure to Decline')" href="?did=<?php echo $result['jclass_id']; ?>">DELETE</a>
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