<?php
include ("inc/header.php");

?>
 <?php
 if(isset($_GET['id']) || $_GET['id'] == NULL){
	$id = $_GET['id'] ;
	$classSession = $class -> classSession($id);	
	}
 ?>


        <section id="service" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Classroom Activites</h2>
                        </div>

                       <a href="discussion.php"> <div class="service_content">
                            <div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                        <img src="assets/images/flaticon1.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>Discussion</h2>
                                        
                                    </div>
                                </div>
                            </div></a>
                            <a href="assignment.php"><div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                       <img src="assets/images/flaticon2.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>Assignment</h2>
                                       
                                    </div>
                                </div>
                            </div></a>
                           <a href="quiz.php"> <div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                      <img src="assets/images/flaticon2.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>Quiz</h2>
                                       
                                    </div>
                                </div>
                            </div></a>
                           <a href="message.php"> <div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                        <img src="assets/images/flaticon4.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>Message</h2>
                                       
                                    </div>
                                </div>
                            </div></a>
							<a href="handout.php"><div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                        <img src="assets/images/flaticon1.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>Handout</h2>
                                       
                                    </div>
                                </div>
                            </div></a>
                            <a href="feedback.php"><div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                        <img src="assets/images/flaticon1.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>feedback</h2>
                                       
                                    </div>
                                </div>
                            </div></a>
                            <a href="session.php"><div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                        <img src="assets/images/flaticon1.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>Session</h2>
                                       
                                    </div>
                                </div>
                            </div></a>
                            <a href="mark.php"><div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                        <img src="assets/images/flaticon1.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>Marks</h2>
                                       
                                    </div>
                                </div>
                            </div></a>
							<a href="settings.php"><div class="col-md-4 col-sm-6">
                                <div class="single_service2">
                                    <div class="single_service_left">
                                        <img src="assets/images/flaticon1.png" alt="" />
                                    </div>
                                    <div class="single_service_right">
                                        <h2>Settings</h2>
                                       
                                    </div>
                                </div>
                            </div></a>
							
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of Service2 Section -->	
	
<?php
include ("inc/footer.php");
?>