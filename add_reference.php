<?php include('database.php');
if(!isset($_SESSION['USERNAME']))
header("Location: login.php");


if (isset($_POST['submit']))
 {
	
	
	 $ref_name=trim($_POST['ref_name']);
	 $ref_score=trim($_POST['ref_score']);
	 $ref_from_age=trim($_POST['ref_from_age']);
	 $ref_to_age=trim($_POST['ref_to_age']);
	 $ref_gender=trim($_POST['ref_gender']);
	  $category=trim($_POST['category']);
	 $order=trim($_POST['order']);
	 
	  $query="INSERT INTO `references` ( `ref_name`, `ref_score`, `ref_from_age`, `ref_to_age`, `ref_gender`,`categoryid`, `order`) VALUES('$ref_name',$ref_score, '$ref_from_age', '$ref_to_age', '$ref_gender','$category',  $order);";
	  mysqli_query($con,$query) or die(mysqli_error($con));
	  echo"<script>alert('Reference save successfully');</script>";

 }
 
  $query1="SELECT * FROM `category` WHERE `status` = 1 ORDER BY `order` ASC";
 $run1=mysqli_query($con,$query1) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Reference</title>
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
					            <div class="panel-title">Add Reference</div>
					          
					            <div class="panel-options">
					              <a href="javascript:window.location.reload();" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" method="post">
								  <div class="form-group">
								    <label for="inputcategory" class="col-sm-2 control-label">Raw Score</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="inputcategory" name="ref_name" required placeholder="Raw Score">
								    </div>
								  </div>
                                  <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">Certile</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="inputorder" required name="ref_score" value="0">
								    </div>
								  </div> 
                                   <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">From Age</label>
								    <div class="col-sm-10">
								      <!--<input type="date" class="form-control"  data-date="today"  value="<?php //echo date('Y-m-d'); ?>"  id="inputorder" name="order" > !-->
                                      <input type="number" class="form-control" id="inputorder" required name="ref_from_age" value=" ">
								    </div>
								  </div>
                                  
                                   <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">To Age</label>
								    <div class="col-sm-10">
								      <!--<input type="date" class="form-control"  data-date="today"  value="<?php //echo date('Y-m-d'); ?>"  id="inputorder" name="order" > !-->
                                      <input type="number" class="form-control" id="inputorder"  name="ref_to_age" value=" ">
								    </div>
								  </div>
                                  
                                  <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">Gender</label>
								    <div class="col-sm-10">
								     <select class="form-control" id="select-1" name="ref_gender">
													<option value="male">Male</option>
													<option value="female">Female</option>
                                                    </select>
								    </div>
								  </div>
                                   <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">Category</label>
								    <div class="col-sm-10">
								     <select class="form-control" id="select-1" name="category">
                                             <?php  while($data1=mysqli_fetch_assoc($run1))
											        {
													echo '<option value="'.$data1['id'].'">'.$data1['category'].'</option>';
													}
										       ?>			
                                                    </select>
								    </div>
								  </div>
                                   <div class="form-group">
								    <label for="inputorder" class="col-sm-2 control-label">Order</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="inputorder" name="order" value="0">
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

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>
  </body>
</html>