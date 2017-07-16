<html>
<body>
<?php
    	include("../includes/connect.php");
    	//include("index.php");
    	$edit_id = $_GET['edit'];
    	$query="select * from posts where Post_id=".$edit_id;
    	$result = mysqli_query($connection , $query);
    	while ($row=mysqli_fetch_array($result)){
    		// echo "<pre>";
    		// print_r($row);
    		// echo "</pre>";
    		$form_id = $row['Post_id'];
    		$edit_title = $row['Post_title'];
    		$edit_author = $row['Post_author'];
    		$edit_image = $row['Post_image'];
    		$edit_content = $row['Post_content'];

      echo"
          <form method='post' action='edit.php?edit=$form_id'>
          	<h2>Update Post Now</h2>
              
              <div class='form-group'>
              <label for='author'>Post Title</label>
                <input type='text' class='form-control' name='title' value='$edit_title'>
              </div>
              <div class='form-group'>
                  <label for='author'>Post Author</label>
                    <input type='text' class='form-control' name='author' value='$edit_author'>
              </div>
              <div class='form-group'>
                  <label for='author'>Post Image</label>
                    <input type='file' class='form-control' name='file'>
                    <img src='../uploads/$edit_image' alt='image' width='50' height='50'>
              </div>
              <div class='form-group'>
                  <label for='comment'>Post Comment</label>
                  <textarea class='form-control' cols='40' rows='5' name='content'>$edit_content</textarea>
              </div>
              <div class='form-group text-center'>
                <input type='submit' class='btn btn-primary' name='update' value='Update Now'>
              </div>
          </form>
      ";
  }
    //echo $update_id = $form_id;
    //$update_id = '';
        // echo "<pre>";
        //   print_r($_REQUEST);
        // echo "</pre>";
    if(isset($_REQUEST['update'])){
        $update_id = $form_id;
        //exit;
        $post_title = $_REQUEST['title'];
        $post_date = date('y-m-d');
        $post_author = $_REQUEST['author'];
        $post_content = $_REQUEST['content'];
        //$post_image = $_POST['image'];
        
        
        $update_query = "update posts set post_title='$post_title', post_date='$post_date',post_author='$post_author',post_content='$post_content' where Post_id='$update_id'";
        $run_update = mysqli_query($connection, $update_query);
        
        if($update_query){
            echo "<script>alert('Post has been updated')</script>";
            echo "<script>window.open('index.php?updated=Post Has been updated','_self')</script>";
        }
    }

?>

</html>
</body>