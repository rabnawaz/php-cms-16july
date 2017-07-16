<?php
    session_start();
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
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <!-- <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>   -->   

                    <div style="padding-top:30px" class="panel-body" >
                        <form  action="login.php" mathod="POST" class="form-horizontal" role="form">      
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                  <button  class="btn btn-success" value="login" name="login">Login  </button>
                                </div>
                            </div>
                        </form>     
                    </div>                     
                </div>  
        </div>
       
    </div>
    </body>
    </html>

<?php  //Start the Session
     require('../includes/connect.php');
    //3. If the form is submitted or not.
    //3.1 If the form is submitted
    if (isset($_GET['login'])){
        //3.1.1 Assigning posted values to variables.
        $username = mysqli_real_escape_string($connection , $_GET['username']);
        $password = mysqli_real_escape_string($connection , $_GET['password']);

        $encrypt = md5($password);
        //3.1.2 Checking the values are existing in the database or not
        $query = "SELECT * FROM `login_admin` WHERE username='$username' and password='$password'";
         
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
        if ($count == 1){
        $_SESSION['username'] = $username;
        }else{
        //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
        }
    
        //3.1.4 if the user is logged in Greets the user with message
        if(mysqli_num_rows($result)>0){
            
            $username = $_SESSION['username'];
            
            echo "<script>window.open('index.php' , '_self')</script>";
        }
        else{
            echo "<script>alert('User name or password is incorrect!')</script>";
        }
    }
    // if (isset($_SESSION['username'])){
    //     $username = $_SESSION['username'];
    //     // echo "Hai " . $username . "
    //     // ";
    //     echo "<script>window.open('index.php' , '_self')</script>";
    //     // ";
    //     // echo "<a href='logout.php'>Logout</a>";
     
    // }
    
    //3.2 When the user visits the page first time, simple login form will be displayed.
?>

