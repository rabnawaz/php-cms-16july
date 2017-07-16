
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		
	</head>
	<body>
	<!--Top Bar-->
	<div class="top_bar">
		<div class="container">
			This is topbar
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
					<div class="post_body">
						<h3>search body</h3>
							<?php
								include('includes/connect.php');

								if(isset($_GET['submit'])){
									$search_id = $_GET['search'];

									$query = "select * from posts where post_title like '%$search_id%'";

									$result = mysqli_query($connection, $query);

									while($row=mysqli_fetch_array($result)){
										$post_id = $row['Post_id'];
										$title = $row['Post_title'];
										$author = $row['Post_author'];
										$date = $row['Post_author'];
										$image = $row['Post_image'];
										$content = substr($row['Post_content'],0,100);
										
									
									
								}
							?>

							<div class="col-sm-6 col-md-4">
								<div class="thumbnail">
								  	<img src="uploads/<?php echo $image; ?>" alt="post img">
								  	<div class="caption">
									    <h3><a href="pages.php?id=<?php echo $post_id;?>"><?php echo $title; ?></a></h3>
									    <p><?php echo $content; ?></p>
									    <h6><em>Author: </em><?php echo $author; ?></h6>
									    <h6>Published on: <i><?php echo $date; ?></i></h6>
									    <p><a href='pages.php?id=<?php echo $post_id ?>' class="btn btn-primary" role="button">More</a></p>
								  	</div>
								</div>
							</div>
							<?php }; ?>
						</div>
					</section>
					
					
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