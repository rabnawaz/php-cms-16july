
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<script type="text/javascript">
			function myClock(){
				var time = new Date();
				var hours = time.getHours();
				var mins = time.getMinutes();
				var sec = time.getSeconds();			
			
			if(sec<10){
				sec = "0"+sec;
			}
			if(mins<10){
				mins = "0"+mins;
			}
			document.getElementById("clock").innerHTML=hours+":"+mins+":"+sec;
			var timer = setTimeout(function(){myClock()},500);
		}
		</script>
		
	</head>
	<body onload="myClock()">
	<!--Top Bar-->
	<div class="top_bar">
		<div class="container">
			<div class="col-sm-6">
				Today is: <?php  echo date("17 JS, F Y")?>
			</div>
			<div class="col-sm-6 text-right">
				<span id="clock"></span>
			</div>
		</div>
	</div>
	<!--Top HEADER TOP-->
		<div>
			<?php include("includes/header.php")  ?>
		</div>
		<!--Top MENU-->
        <div>
			<?php include("includes/nav.php")  ?>
		</div>
		<!--MAIN SECTION-->
		<div id="main" role="main">
			<div class="container">
				<div class="row">
					<section class="post_section col-xs-8">
	                    <div style="padding-top:30px" class="panel-body" >
	                        <form  action="contact.php" mathod="POST" class="form-horizontal" role="form">      
	                            <div style="margin-bottom: 25px" class="input-group">
	                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                                <input id="login-username" type="text" class="form-control" name="subject" value="" placeholder="Subject">                                        
	                            </div>
	                            <div style="margin-bottom: 25px" class="input-group">
	                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                                <input id="login-password" type="email" class="form-control" name="email" placeholder="email">
	                            </div>
	                            <div style="margin-bottom: 25px" class="input-group">
	                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	                                <textarea cols="100"  class="form-control" name="message" placeholder="message write here"></textarea>
	                            </div>
	                            <div style="margin-top:10px" class="form-group">
	                                <div class="col-sm-12 controls">
	                                  <button  class="btn btn-success" value="login" name="send_email">Contact</button>
	                                </div>
	                            </div>
	                        </form>     
	                    </div>
	                    <?php
	                    // Please specify your Mail Server - Example: mail.example.com.
ini_set("SMTP","mail.example.com");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","25");

// Please specify the return address to use
ini_set('sendmail_from', 'example@YourDomain.com');
	                    	if(isset($_GET['send_email'])){
	                    		$sender_email = $_GET['email'];
	                    		$subject = $_GET['subject'];
	                    		$mes = $_GET['message'];
	                    		$to = 'rabnawazlhr@gmail.com';

	                    		if($sender_email=='' or $subject=='' or $mes==''){
	                    			echo "<script>alert('Please fill empty field')</script>";
	                    			exit();
	                    		}
	                    		
	                    		$message = 'Email From : <br>'.$mes;

	                    		mail($to , $subject , $sender_email , $message);

	                    		$to_sender = $_GET['send_email'];
	                    		$sub = "Rab.Nawaz.com";
	                    		$mesg = "Thank you for sending email we will get you to soon";
	                    		$from = 'n_rabnawaz@yahoo.com';

	                    		mail($to_sender, $sub , $mesg , $from);

	                    		echo "<h2><center>Email recived us, get to you soon</center></h2>";

	                    	}
	                    ?>                     
					</section>
					
						<?php include("includes/side_bar.php")  ?>
					
				</div>
				</div>
		</div>
		<!--Top FOOTER-->
		<footer class="footer text-center">
			<p>Copy right by malal....</p>
		</footer>
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>