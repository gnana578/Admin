<?php include('database.php');
if(!isset($_SESSION['USERNAME']))
header("Location: login.php");

if(isset($_GET['action']))
{
	
	 echo $query="DELETE FROM `question` WHERE `id`=".trim($_GET['id']);
     $run=mysqli_query($con,$query) or die(mysqli_error($con));
	 header("location: index.php");
}


 $query="SELECT t1.*,t2.category FROM `question` t1 LEFT JOIN category t2 ON  t2.id=t1.categoryid WHERE t1.status = 1 ORDER BY t1.order ASC";
 $run=mysqli_query($con,$query) or die(mysqli_error($con));
 

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Questions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

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
	                <div class="col-lg-12">
	                  <div class="input-group form" style="display:none;">
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
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Questions</div>
                   <a href="add_question.php"> <button class="btn btn-primary left"><i class="glyphicon glyphicon-plus-sign"></i> Add</button></a>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr>
								<th>Questions</th>
                                <th>Category</th>
                                <th>Asign Score</th>
								<th>Order</th>
                                <th width="200px">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        
                        <?php
						$i=0;
						
						while($data=mysqli_fetch_assoc($run)) 
						{
						
							if($i%2==0)	
							{
								echo'<tr class="even">
									<td>'.$data['question'].'</td>
									<td>'.$data['category'].'</td>
									<td>'.$data['asign_score'].'</td>
									<td><span title='.intval($data['order']).'>'.$data['order'].'</span></td>
									<td><a href="edit_question.php?id='.$data['id'].'"><button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</button> </a> &nbsp; <button class="btn btn-danger" onClick="deleteitem('.$data['id'].')"><i class="glyphicon glyphicon-remove"></i> Delete</button></td>
									
								</tr>';
							}
							else
							{
								echo'<tr class="odd">
									<td>'.$data['question'].'</td>
									<td>'.$data['category'].'</td>
									<td>'.$data['asign_score'].'</td>
									<td><span title='.intval($data['order']).'>'.$data['order'].'</span></td>
									<td><a href="edit_question.php?id='.$data['id'].'"><button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</button> </a> &nbsp; <button class="btn btn-danger" onClick="deleteitem('.$data['id'].')"><i class="glyphicon glyphicon-remove"></i> Delete</button></td>
									
								</tr>';
							}
						}
						?>	
						</tbody>
					</table>
  				</div>
  			</div>



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

      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
    <script>
	function deleteitem(id)
	{
		if(confirm('Are you sure delete question'))
		{
		 	window.location='?action=delete&id='+id;
		}
	}
	
	</script>
  </body>
</html>