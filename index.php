<?php
include ("inc/header.php");
?>
 <?php
 	$login = Session::get('userLogin');
 	if($login == false){
 		echo '<script type="text/javascript">
				location.replace("login.php");
			  </script>';
 	}
 ?> 


        <!-- Sections -->
        <section id="business" class="portfolio sections">
            <div class="container">
                <div class="head_title text-center">
                    <h1>Your Recent Active Classroom </h1>
					
                </div>
<?php
	$id = Session::get("id");
	$getclass = $user -> getAllClass($id);

	if($getclass){
		while ($result = $getclass ->fetch_assoc()) {
?>
                
                    <div class="portfolio-wrapper text-center">
                       <a href="class.php?id=<?php echo $result['class_id']; ?>"> <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="community-edition">
                                <i class="fa fa-book"></i>
                                <div class="separator"></div>
                                <h4><?php echo $result['classname'];?></h4>
								<h5><?php echo $result['coursename'];?></h5>
                                <h5>Classcode:<?php echo $result['classcode'];?></h5>
								<h5>Coursecode:<?php echo $result['coursecode'];?></h5>
                            </div>
                        </div></a>
                    </div>
                    
					<?php } }?>
                </div>
  
        </section>



<?php
include ("inc/footer.php");
?>
