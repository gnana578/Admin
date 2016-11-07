<?php 
include('database.php');

if (isset($_POST['submit']))
 {
	$username=trim($_POST['username']);
	$password=md5(trim($_POST['password']));
	
	$query = mysqli_query($con,"select * from testers where status=1 AND password='$password' AND email='$username'");
	$data = mysqli_fetch_assoc($query);
    if (isset($data['id'])) 
	{
	   $_SESSION['USERNAME']=$data['firstname']; // Initializing Session
	   header("location: test.php"); // Redirecting To Other Page
	} 
	else 
	{
	  echo "<script>alert('Username or Password is invalid')</script>";
	}
	
 }



?>
<!DOCTYPE html>
<html>
  <head>
    <title>User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="#">User Login</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
			                <div class="social" style="display:none;">
	                            <a class="face_login" href="#">
	                                <span class="face_icon">
	                                    <img src="images/facebook.png" alt="fb">
	                                </span>
	                                <span class="text">Sign in with Facebook</span>
	                            </a>
	                            <div class="division">
	                                <hr class="left">
	                                <span>or</span>
	                                <hr class="right">
	                            </div>
	                        </div>
                            <form action="" method="post">
			                <input class="form-control" type="text" placeholder="E-mail address" name="username">
			                <input class="form-control" type="password" placeholder="Password" name="password">
                            
			                <div class="action">
			                    <input type="submit" name="submit" class="btn btn-primary signup" value="Login" />
			                </div>  
                            </form>              
			            </div>
			        </div>

			        <div class="already">
			            <p>Don't have an account yet?</p>
			            <a href="signup.php">Sign Up</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>