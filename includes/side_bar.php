<aside class="side_bar col-xs-4">
	<form class="center">
		<div class="form-group">
			<label for="exampleInputEmail1 center">Subscribe via email</label>
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
		</div>
		  <button type="submit" class="btn btn-default center">Subscribe</button>
	</form>
	<h3>Follow us</h3>
    <hr>
        <div class="text-center center-block">
            <br />
            <a href="#"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
            <a href="#"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
            <a href="#"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
            <a href="#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
		</div>


<?php 
	include("connect.php");

	$query = "select * from posts order by 1 DESC LIMIT 0, 4";

	$result = mysqli_query($connection, $query);
	//exit;
	while($row = mysqli_fetch_assoc($result)){
		$post_id = $row['Post_id'];
		$title =  $row['Post_title'];
		$image =  $row['Post_image'];
	

?>

	<div class="row">
		<div class="col-xs-12">
			<center class="center">
			<a href='pages.php?id=<?php echo $post_id;?>'><h3><?php echo $title ?></h3></a>
			<a href='pages.php?id=<?php echo $post_id;?>'><img src="uploads/<?php echo $image ?>" alt="recent-post-img" width="200"; height="150"></a>
			</center>
		</div>
	</div>

	<?php } ?>
</aside>