<?php
include ("inc/header.php");

?>

<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_ques'])){

        $addquestion = $exam -> addQuestion($_POST);
    }
	$getqsnNo = $exam ->getTotalRows();
	$number = $getqsnNo+1;
?>
	
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Add Questions</h2>
							<?php
										if(isset($addCTno)){
											echo $addCTno;
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
											<input type="hidden" class="form-control" name="class_id" value="<?php echo Session::get('class_id') ;?>">
									    </div>
<?php
	 if(isset($_GET['id'])){
        $id = $_GET['id'];
        $getctNo = $exam ->getctNo($id);
   	 }
	 if($getctNo){
		while ($result = $getctNo ->fetch_assoc()) {
?>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="ct_id" value="<?php echo $result['ct_id'];?>">
                                        </div>
<?php } } ?>
										<div class="form-group">
                                            <input type="hidden" class="form-control" name="quesNo" value="<?php if(isset($number)){ echo $number ;}  ?>" >
                                        </div>
										<div class="form-group">
                                            <input type="text" class="form-control" name="ques" placeholder="enter your question"">
                                        </div>
										<div class="form-group">
                                            <input type="text" class="form-control" name="ans1" placeholder="enter your Choise One">
                                        </div>
										<div class="form-group">
                                            <input type="text" class="form-control" name="ans2" placeholder="enter your Choise two">
                                        </div>
										<div class="form-group">
                                            <input type="text" class="form-control" name="ans3" placeholder="enter your Choise three">
                                        </div>
										<div class="form-group">
                                            <input type="text" class="form-control" name="ans4" placeholder="enter your Choise four">
                                        </div>
										<div class="form-group">
                                            <input type="number" class="form-control" name="rightAns" placeholder="enter right answer number">
                                        </div>
										<div class="center-content">
                                            <input type="submit" name="add_ques" value="Submit" class="btn btn-default">
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
	 if(isset($_GET['delQues'])){

        $id = $_GET['delQues'];
        $delQues = $exam ->delQues($id);
   	 }
?>

	
		<div class="container">
				<div class="row">
					
					
					<div class="col-md-12">
					<h4>Questions Datatable</h4>
					<div class="table-responsive">

							
						  <table id="mytable" class="table table-bordred table-striped">
							   
							   <thead>
							   <th>Serial No.</th>
								<th>Question Title</th>
								<th>Delete</th>
							   </thead>
				<tbody>
<?php
	 if(isset($_GET['id'])){

        $id = $_GET['id'];
        $getQuestions = $exam ->getQuestions($id);
   	 }
	 if($getQuestions){
		$i =0;
		while ($result = $getQuestions ->fetch_assoc()) {
		$i++;
?>
				<tr>
				
				<td><?php echo $i; ?></td>
				<td><?php echo $result['ques']; ?></td>
				
				<td>
					<a onclick='return confirm("Are you sure to delete")' href="?delQues=<?php echo $result['quesNo']?>" >
					<p data-placement="top" data-toggle="tooltip" title="Delete">
					<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
					<span class="glyphicon glyphicon-trash"></span></button></p></td></a>
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