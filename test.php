<?php include('database.php');
//if(!isset($_SESSION['USERNAME']))
//header("Location: login.php");

if(isset($_GET['action']))
{
	
}


 $query="SELECT * FROM `question` WHERE `status` = 1 ORDER BY `order` ASC";
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
	<style>
		.header{
			display: none;
		}
		footer{
			display: none;
		}
		.content-box, .content-box-large{
			background: transparent !important;
		}
	</style>
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
		  
		  <div class="col-md-12">
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Questions</div>
                   <input type="hidden" id="plusscore" value="0" />
                   <input type="hidden" id="minusscore" value="0" />
 				</div>
  				<div class="panel-body">
  				  <?php  
				  $i=0;
				  $display='block';
                    while($data=mysqli_fetch_assoc($run)) 
						{
							if($i>1)
							$display='none';
					
                            echo   "<div class='question question_".$data['order']."' id='question_".$data['id']."' onClick='updatereport(".$data['asign_score'].",".$data['id'].",".$data['order'].")' style='display:".$display.";' >".$data['question']."</div>";
                         $i++;
					    }
						
						
  				  ?>
                  <div id="result">
                  
                  </div>
                </div>
  			</div>
                   <input type="hidden" id="totalquestion" value="<?php echo $i/2 ;?>" />;
                   <input type="hidden" id="clickNumber" value="0" />
            

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
	var numberOfQuestionsAnswered = 0;
	var warning = 0;
	var start = new Date();
	function updatereport(score,id,order)
	{
		validatetime();
		$("#question_"+id).css('background-color','#dfffd6');
		
		if(score<0)
		$("#minusscore").val(Number(score)+Number($("#minusscore").val()));
		else
		$("#plusscore").val(Number(score)+Number($("#plusscore").val()));
		
		$("#clickNumber").val(1+Number($("#clickNumber").val()));
		
		
		$(".question_"+order).hide(1500);
		order=Number(order)+1;
		$(".question_"+order).show(1500);
		var result=Number($("#plusscore").val())+Number($("#minusscore").val());
		
		
		if($("#clickNumber").val()==$("#totalquestion").val())
		var htm ='<table width="500" cellpadding="5" cellspacing="5"><tr><td colspan="3" ><h3>Raw Result</h3></td></tr><tr><td>Number of (+) Scoring: </td><td>'+Number($("#plusscore").val())+'</td></tr><tr><td>Number of (-) Scoring: </td><td>'+Number($("#minusscore").val())+'</td></tr><tr><td>Total Scoring: </td><td>'+result+'</td></tr></table>';
		$("#result").html(htm);
	}
	
	function validatetime(){
		numberOfQuestionsAnswered = numberOfQuestionsAnswered+1;
		if(numberOfQuestionsAnswered >= 5){
			var elapsed = new Date() - start;
			if(elapsed < '20000'){
			  warning = warning+1;
			  if(warning>=4){
				alert("Test comleted");
				start = new Date();
			  }
			  else{
				  if(warning == 1){
					alert("Warning one message goes here");  
				  }
				  else if(warning == 2){
					  alert("Warning two message goes here");
				  }
				  else{
					  alert("Final Warning message goes here");
				  }
				  numberOfQuestionsAnswered = 0;
				  start = new Date();
			  }
		 
			}
			else{
			 //alert("reset all var"+elapsed);
			 numberOfQuestionsAnswered = 0;
			 start = new Date();
			}
		}

	}
	
	
	</script>
  </body>
</html>