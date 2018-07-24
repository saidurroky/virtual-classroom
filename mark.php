<?php
include ("inc/header.php");

?>
<style>
	.display thead{}
</style>

<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_mark'])){

        $add_mark = $marks -> add_mark($_POST);
    }
?>	
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Give Marks</h2>
							
							<?php
										if(isset($add_mark)){
											echo $add_mark;
										}
									?>
                        </div> 
						

		<div class="table-responsive">	
			<form action="" method="post" id="formid">	
				<table id="mytable" class="table table-bordred table-striped">
					   
				<thead>
					
					   <th>Name</th>
					   <th></th><th></th>
						<th>Class Test-1</th>
						<th>Class Test-2</th>
						<th>Assignment</th>
						<th>Attendence</th>
						<th>Final Test</th>
				</thead>
				<tbody>
				
				</tbody>
						<?php
								$class_id = Session::get("class_id");
								$getstudent = $feedback ->getstudent($class_id);

								if($getstudent){
									
									while ($result = $getstudent ->fetch_assoc()) {
									
							?>	
	
					<tr> 
						<td><input name="name" value="<?php echo $result['fname']; ?>   <?php echo $result['lname']; ?>" type="test"  readonly /></td> 
						<td><input name="user_id" value="<?php echo $result['id']; ?>" type="hidden"></td>
						<td><input name="class_id" value="<?php echo Session::get("class_id"); ?>" type="hidden"></td>
						<?php } } ?>
						<td><input name="ct1"  type="text"></td>
						<td><input name="ct2"  type="text"></td>
						<td><input name="assignment" type="text"></td>
						<td><input name="attendence" type="text"></td> 
						<td><input  name="final" type="text"></td> 						 
					</tr> 
				</table>
				<div class="center-content">
                    <input type="submit" name="add_mark" value="Submit" class="btn btn-default">
                </div>                               
               
			</form>
		</div>

	</section>					
               

		<div class="container">
				<div class="row">
					
					
					<div class="col-md-12">
					<h4>Marks Of All Student</h4>
					<div class="table-responsive">

							
						  <table id="mytable" class="table table-bordred table-striped">
							   
							   <thead>
							   <th>Serial No.</th>
								<th>Name</th>
								<th>Class Test-1</th>
								<th>Class Test-2</th>
								<th>Assignment</th>
								<th>Average Of Midterm</th>
								<th>Attendence</th>
								<th>Final Test</th>
								<th>Total Marks</th>
							   </thead>
				<tbody>


                          
							<?php
								 $class_id = Session::get("class_id");
								$getmarks = $marks ->getmarks($class_id);

								if($getmarks){
									$i =0;
									while ($result = $getmarks ->fetch_assoc()) {
									$i++;
							?>	
	
		
				<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $result['name']; ?></td>
				<td><?php echo $result['ct1']; ?></td>
				<td><?php echo $result['ct2']; ?></td>
				<td><?php echo $result['assignment']; ?></td>
				<td><?php 
						$ct1 = $result['ct1'];
						
						$ct3 =  $result['assignment'];
						$average=($ct1+$ct3)/2;
						echo $average;
					 ?>
				</td>
				<td><?php echo $result['attendence']; ?></td>
				<td><?php echo $result['final']; ?></td>
				<td><?php 
						$ct = $average;
						$att =  $result['attendence'];
						$finl =  $result['final'];
						$total=($ct+$att+$finl);
						echo $total;
					 ?>
				</td>
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