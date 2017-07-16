<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");

    }
    else{
?>
<head>
    <title>Admin Panel</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.css" rel="stylesheet">
        <link href="../css/all.css" rel="stylesheet">
        <!-- Bootstrap -->
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
	<header class="admin-header">
		<h1><a href="index.php">Well come to Admin</a></h1>
	</header>
	<div class="admin-sidebar col-sm-3">
		<div id="sidebar" class="well sidebar-nav">
            <h3><i class="glyphicon glyphicon-home"></i>
                MANAGEMENT
            </h3>
            <ul class="nav nav-pills nav-stacked">
                <li class="username"><span>Wellcome :</span> <?php echo $_SESSION['username']; ?></li>
                <li class="logout.php"><a href="logout.php">Admin Logout</a></li>
                <li><a href="index.php?view=view">View Posts</a></li>
                <li><a href="index.php?insert=insert">Insert New Posts</a></li>
            </ul>
            
        </div>
	</div>
	<section class="post_section col-xs-9">
		<h1>This is admin panel</h1>
        
        <?php
            include("../includes/connect.php");
            $s = 1;

            if(isset($_GET['view'])){
                $query = "select * from posts order by 1 DESC";
                $result = mysqli_query($connection, $query);
                echo"
                    <table class='table' border='1'>
                    <tr>
                        <td align='center' bgcolor='yellow' colspan='8'>View All Posts</td>
                    </tr>
                    <tr>
                        <th>Post No</th>
                        <th>Post Title</th>
                        <th>Post Date</th>
                        <th>Post Author</th>
                        <th>Post Image</th>
                        <th>Post Content</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                ";
                while ($row=mysqli_fetch_assoc($result)){
                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre>";
                    $edit_id = $row['Post_id'];
                    $post_title = $row['Post_title'];
                    $post_date = $row['Post_date'];
                    $post_author = $row['Post_author'];
                    $post_image = $row['Post_image'];
                    $post_content = substr($row['Post_content'],0,100);
        ?>

            
                <tr>
                    <td><?php echo $s++; ?></td>
                    <td><?php echo $post_title;?></td>
                    <td><?php echo $post_date;?></td>
                    <td><?php echo $post_author;?></td>
                    <td><img src="../uploads/<?php echo $post_image;?>" width="80" height="80"></td>
                    <td><?php echo $post_content;?></td>
                    <td><a href="index.php?edit=<?php echo $edit_id;?>">Edit</a></td>
                    <td><a href="delete.php?del=<?php echo $edit_id?>">Delete</a></td>
                </tr>
            

        <?php }} ?>
    </table>

		<?php
            if(isset($_GET['insert'])){
                include("insert_post.php");
            } 
            if(isset($_GET['edit'])){
                include("edit.php");
            } 

        ?>
	</section>
</body>
</html>

<?php } ?>

<?php 
print_r($_SESSION); 
//session_destroy();
 ?>