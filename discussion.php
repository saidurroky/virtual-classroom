<?php
include ("inc/header.php");

?>

<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_discussion'])){

        $addDiscussion = $class -> addDiscussion($_POST,$_FILES);
    }
?>
	
        <section id="register" class="service2  lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            
							<?php
								if(isset($addDiscussion)){
									echo $addDiscussion;
								}
							?>
                        </div>
						
                        <div class="contact_content">
						<form action="" method="post" id="formid" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="single_left_contact">
									<h4>Make Post</h4>
										 <div class="form-group">
                                            <input type="hidden" class="form-control" name="userid" value="<?php echo Session::get('id') ;?>">
                                        </div>  
									
                                        <div class="form-group">
                                            <textarea class="form-control" name="body" rows="8" placeholder="body"></textarea>
                                        </div>
										
										                               
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="single_left_contact">
									<h4>    .</h4>
										 <div class="form-group">
                                            <input type="text" class="form-control" name="title" placeholder="title">
                                        </div>  
										 <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="<?php echo Session::get('fname') ;?>">
                                        </div>  
                                        <div class="form-group">
                                           <input type="file" name="image" class="form-control" />
                                        </div>
										
										<div class="form-group">
											<input type="hidden" class="form-control" name="class_id" value="<?php echo Session::get('class_id') ;?>">
										</div>
										<div class="center-content">
                                            <input type="submit" name="add_discussion" value="Submit" class="btn btn-default">
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
	$class_id = Session::get("class_id");
	$getdiscussionpost = $class ->getDiscussionPost($class_id);

	if($getdiscussionpost){
		while ($result = $getdiscussionpost ->fetch_assoc()) {
?>		
		
		
		<!-- Sections -->
        <section id="footer-menu" class="sections footer-menu">
            <div class="container">
               <div class="row">
					<div class="samepost clear">
						<h2><a href="dis_detail.php?id=<?php echo $result['discussion_id']; ?>"><?php echo $result['title']; ?></a></h2>
						<h4>By <?php echo $result['name']; ?></h4>
						 <a href="#"><img src="<?php echo $result['image']; ?>" alt="click here to download pdf file" style="max-width:200px"></a>

						<p style="float:right;width:890px;line-height: 2.5rem;"><?php echo $fm ->textshorten($result['body'], 60) ;?>.......
							<a href="dis_detail.php?id=<?php echo $result['discussion_id']; ?>">
								<button class="btn btn-primary" style="width: 90px;height: 35px;padding:0px">Read More</button>
							</a>
						</p>
					</div>
			   </div>
            </div> <!-- /container -->       
        </section>
	 <?php      } }  ?>
	
		

<?php
include ("inc/footer.php");
?>