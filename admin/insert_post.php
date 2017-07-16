<?php
    //session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");

    }
    else{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap 101 Template</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/all.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
    <form method="post" action="insert_post.php" enctype="multipart/form-data">
    	<h2>INsert Post Now</h2>
        <div class="form-group">
          <label for="title">Post Title</label>
          <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
        <label for="author">Post Author</label>
          <input type="text" class="form-control" name="author">
        </div>
        <div class="form-group">
            <label for="post_image">Post Image</label>
          <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
        <label for="comment">Post Comment</label>
          <textarea class="form-control" colsrow="50" cols="40" name="content"></textarea>
        </div>
        <div class="form-group text-center">
          <input type="submit" class="btn btn-primary" name="submit" value="Publish Now">
        </div>
    </form>
</body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
</html>

<?php
  include("../includes/connect.php");


		
	if(isset($_POST['submit'])){
		
		$title = $_POST['title'];
		$date = date('m-d-y');
		$author = $_POST['author'];
		$content = $_POST['content'];
		$image_name = $_FILES['image']['name'];
		

		$target_dir = "../uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		

		$sql = "INSERT INTO posts (Post_title,Post_author,Post_content, Post_image, Post_date)
		VALUES('$title','$author', '$content','$image_name', '$date')";
		if(!mysqli_query($connection,$sql)){
			echo 'Not inserted data';
		}
		else{
			echo 'Inserted';
		}
		
	}
 
?>

<?php } ?>

