<section class="post_section col-xs-8">
	<h1>this is post body</h1>
	<div class="row">
   <?php
	   include("connect.php");
	   $query = "select * from posts order by rand() LIMIT 0,3";

	   //echo $query;

	  $run = mysqli_query($connection, $query);

	   while($row=mysqli_fetch_assoc($run)){
	   	// echo "<pre>";
	   	// print_r($row);
	   	// echo "</pre>";
	   		$post_id = $row['Post_id'];
	   		$title = $row['Post_title'];
	   		$author = $row['Post_author'];
	   		$date = $row['Post_date'];
	   		$content = substr($row['Post_content'],0,80);
	   		$image = $row['Post_image'];
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
	
	<?php } ?>

	</div>
</section>