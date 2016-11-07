<?php include('database.php');
if(!isset($_SESSION['USERNAME']))
header("Location: login.php");


if (isset($_POST['submit']))
 {
	 $question=mysqli_real_escape_string($con,trim($_POST['question']));
	 $ref_score=trim($_POST['ref_score']);
	 $queid=trim($_POST['queid']);
	 $category=trim($_POST['category']);
	 $order=trim($_POST['order']);
	 
	  $query="UPDATE question SET `question`='$question',`asign_score`='$ref_score',`categoryid`='$category',`order`='$order' WHERE id='$queid';";
	  mysqli_query($con,$query) or die(mysqli_error($con));
	  echo"<script>alert('Question  Update successfully'); window.location='index.php';</script>";

 }
 $query="SELECT * FROM `question` WHERE `id`=".trim($_GET['id']);;
 $run=mysqli_query($con,$query) or die(mysqli_error($con));
 $data=mysqli_fetch_assoc($run);
 
  $query1="SELECT * FROM `category` WHERE `status` = 1 ORDER BY `order` ASC";
 $run1=mysqli_query($con,$query1) or die(mysqli_error($con));
 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Question</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="#">Admin</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12" style="display:none;">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="#profile.php">Profile</a></li>
	                          <li><a href="logout.php">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                     <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="category.php"><i class="glyphicon glyphicon-tasks"></i> Category</a></li>
                    <li><a href="reference.php"><i class="glyphicon glyphicon-tasks"></i> Reference</a></li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">

	  			<div class="row">
	  				
	  				<div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">Edit Question</div>
					          
					            <div class="panel-options">
					              <a href="javascript:window.location.reload();" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" method="post">
                                <input type="hidden" class="form-control"  name="queid" required  value="<?php echo $data['id']; ?>"> 
								  <div class="form-group">
                                     <label for="inputorder" class="col-sm-2 control-label">Question</label>
								    <div class="col-sm-10">
								      <textarea id="tinymce_basic" name="question"><?php echo $data['question']; ?></textarea>
								    </div>
								  </div>
                                  <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">Asign Score</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="inputorder" required name="ref_score" placeholder="+1 OR -1"  value="<?php echo $data['asign_score']; ?>">
								    </div>
								  </div> 
                                   <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">Category</label>
								    <div class="col-sm-10">
								     <select class="form-control" id="select-1" name="category">
                                             <?php  while($data1=mysqli_fetch_assoc($run1))
											        {
													   if($data1['id']==$data['categoryid'])
														echo '<option value="'.$data1['id'].'" selected >'.$data1['category'].'</option>';
														else
														echo '<option value="'.$data1['id'].'">'.$data1['category'].'</option>';
													}
										       ?>			
                                    </select>
								    </div>
								  </div>
                                   <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">Order</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputorder" name="order" required  value="<?php echo $data['order']; ?>">
								    </div>
								  </div>
								  
								  
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  			</div>



	  		<!--  Page content -->
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright <?php echo date('Y');?> <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <script src="vendors/ckeditor/ckeditor.js"></script>
    <script src="vendors/ckeditor/adapters/jquery.js"></script>

    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
  </body>
</html>