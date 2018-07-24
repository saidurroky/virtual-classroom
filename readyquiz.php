<?php
 include 'inc/header.php';
 Session::checkSession();

 if (isset($_GET['q'])) {
 	$qnumber = (int)$_GET['q'];
 }

 $gettotal = $exam->getTotalRows(); 
 $crntqstn = $exam->getCrrntQuestion($qnumber);

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 	$process = $exam->getProcess($_POST);
 }
?>
<style>
	.strttest{border: 1px solid #f4f4f4;margin: 0 auto;padding: 20px;width: 594px;}
	.strttest h2{border-bottom: 1px solid #ddd;font-size: 22px;margin-bottom: 10px;padding-bottom: 10px;text-align: center;}
	.strttest p{margin: 13px 0 6px 0;}
	.strttest ul {list-style: none; margin: 0;padding: 0;}
	.strttest ul li{margin-bottom: 5px;}
	.strttest a{text-decoration: none;background: #cfcfcf;padding: 8px;border: 1px solid #b0b0b0;display: block;text-align: center;color: #444;margin-top: 27px;font-size: 20px;}
</style>
        <section id="register" class="service2 sections lightbg">
 <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
						<div class="strttest">
						<h1>Question <?php echo $crntqstn['quesNo']; ?> of <?php echo $gettotal; ?></h1>
							
								<form method="post" action="">
								
										 <h4>Que <?php echo $crntqstn['quesNo']; ?>: <?php echo $crntqstn['ques']; ?></h4>
							
							<?php 
								$answer = $exam->getAnswer($qnumber);
								if ($answer) {
									while ($result = $answer->fetch_assoc()) {
									
							?>
								<table> 
									<tr >
										<td >
										 <input type="radio" name="ans" value="<?php echo $result['id']; ?>" /><?php echo $result['ans']; ?>
										</td>
									</tr>
									
							<?php } } ?>
									<tr>
									  <td>
										<input type="hidden" name="number" value="<?php echo $qnumber; ?>" />
										<input type="submit" name="submit" value="Next Question"/>
										
									</td>
									</tr>
								</table>
							</form>
					</div>
						 </div>        
                    </div>
                </div>
            </div>
   </section>
<?php include 'inc/footer.php'; ?>