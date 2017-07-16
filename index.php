
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
					<div>
						<?php include("includes/post_body.php")  ?>
					</div>
					<div>
						<?php include("includes/side_bar.php")  ?>
					</div>
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