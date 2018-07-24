<?php
include ("inc/header.php");

?>
<?php 
include_once "classes/shout.php";

$shout=new Shout();

?>
<style>
/*	.wrapper{width: 800px; margin: 0 auto;}
.clr{overflow: hidden;}
.headersection,.footersection{background: #ddd;padding: 10px;text-align: center;}
.headersection h2,.footersection h2{}
.content{border: 15px solid #ddd;min-height: 500px;}*/
.box{border: 5px solid #999;margin: 30px auto 0;padding: 20px;width: 800px;height: 300px;overflow: scroll;}
.box ul{margin: 0;padding: 0;list-style: none;}
.box ul li{display: block;border-bottom: 1px dashed #ddd;margin-bottom: 5px;padding-bottom: 5px;}
.box ul li:last-child{border-bottom: 0px dashed #ddd;margin-bottom: 0px;padding-bottom: 0px;}

.box span{color: #888;}
.shoutform{border: 5px solid #999;margin: 20px auto 10px;padding:20px;width: 800px;}
.shoutform input [type="text"]{
	padding: 5px;
	margin-bottom: 10px;
	width: 600px;


}

</style>

<div class="wrapper clr">

<section class="content clr">
	<div class="box">
					
			<ul>
		<?php

           $getData=$shout->getAllData();

              if ($getData) {

              	//table theke all field niye asha
              	while ( $data=$getData->fetch_assoc()) {?>
              	
              	<li><span><?php echo $data['time']?></span>-<b><?php echo $data['name']?></b> 
              		  <?php echo $data['body']?></li>
              	<?php } }?>
			

			</ul>


	</div>


<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_shout'])){

        $addshout = $shout -> addShout($_POST);
    }
?>

		<div class="contact_content ">
						<form action="session.php" method="post" id="formid">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="single_left_contact">
										 <div class="form-group">
											<input type="hidden" class="form-control" name="class_id" value="<?php echo Session::get('class_id') ;?>">
									    </div> 
									
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="name">
                                        </div>
										<div class="form-group">
											<input type="text" class="form-control" name="body" placeholder="body">
									    </div>
										
										<div class="center-content">
                                            <input type="submit" name="add_shout" value="Submit" class="btn btn-default">
                                        </div>                               
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            
							 </form>
                        </div>


</section>


<?php
include ("inc/footer.php");

?>
