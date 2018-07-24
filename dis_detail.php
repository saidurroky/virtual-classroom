<?php
include ("inc/header.php");

?>
 <?php
 if(isset($_GET['id']) || $_GET['id'] == NULL){
	$id = $_GET['id'] ;
	$dis_details = $class -> dis_details($id);	
	}
	if($dis_details){
		while ($result = $dis_details ->fetch_assoc()) {
 ?>

		
		
		
		<!-- Sections -->
        <section id="footer-menu" class="sections footer-menu">
            <div class="container">
               <div class="row">
					<div class="samepost clear">
						<h2><a href=""><?php echo $result['title']; ?></a></h2>
						<h4>By <?php echo $result['name']; ?></h4>
						 <a href="#"><img src="<?php echo $result['image']; ?>" alt="click here to download pdf file" style="max-width:200px"></a>

						<p style="float:right;width:890px;line-height: 2.5rem;"><?php echo $result['body'] ;?></p>
					</div>
			   </div>
            </div> <!-- /container -->       
        </section>
	 
	
	<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addcomment'])){

        $addcomment = $class -> addcomment($_POST,$_FILES);
    }
?>
	
        <section id="register" class="service2  lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            
							<?php
								if(isset($addcomment)){
									echo $addcomment;
								}
							?>
                        </div>
						
						 <div class="contact_content">
						<form action="" method="post" id="formid">
                            <div class="col-md-12">
                                <div class="single_left_contact">
									<h4>Comment</h4>
									<p>By <?php echo $result['name']; ?></p>
									<p><?php echo $result['comment']; ?></p>
                                        
										                        
                                </div>
                            </div>
                             
							 </form>
							
                        </div>
						
						
                        <div class="contact_content">
						<form action="" method="post" id="formid">
                            <div class="col-md-6">
                                <div class="single_left_contact">
									<h4>Comment</h4>
										 <div class="form-group">
                                            <input type="hidden" class="form-control" name="userid" value="<?php echo Session::get('id') ;?>">
                                        </div>  
									
                                        <div class="form-group">
                                            <textarea class="form-control" name="body" rows="8" placeholder="body"></textarea>
                                        </div>
										 <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="<?php echo Session::get('fname') ;?>">
                                        </div> 
										 <div class="form-group">
                                            <input type="hidden" class="form-control" name="discussion_id" value="<?php echo $result['discussion_id']; ?>">
                                        </div> 
										<div class="center-content">
                                            <input type="submit" name="addcomment" value="Submit" class="btn btn-default">
                                        </div> 
										                               
                                </div>
                            </div>
                             
							 </form>
							 <?php      } }  ?>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of Contact Section -->	

<?php
include ("inc/footer.php");
?>