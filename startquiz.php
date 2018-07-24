<?php
include ("inc/header.php");

?>

<?php
	 if(isset($_GET['id'])){
        $id = $_GET['id'];
        $getfrstques = $exam ->getfrstques($id);
   	 }
	 
?>
        <section id="register" class="service2 sections lightbg">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>Start Quiz</h2>
							<p>please click the button to start your quiz</p>
								<a href="readyquiz.php?q=<?php echo $getfrstques['quesNo'];?>">
								<p data-placement="top" data-toggle="tooltip" title="take quiz ">
								<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >Start Quiz
								</button></p></a>
                        </div>        
                    </div>
                </div>
            </div>
        </section><!-- End of Contact Section -->
	

<?php
include ("inc/footer.php");
?>