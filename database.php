<?php session_start();
$host="localhost";
$user="root";
$pass="admin#1"; //Change password here 
//connection
$con=mysqli_connect($host,$user,$pass) or die(mysqli_error($con));
//db selection
mysqli_select_db($con,"question_paper");

 // enter test data remove when live
/*for($i=1; $i<181; $i++)
{
$query="INSERT INTO `question` ( `question`, `asign_score`, `asign`, `referenceid`, `categoryid`, `section`, `status`, `order`) VALUES
('<p>(A) Teach a short gardening course to new homeowners.</p>', 1, 0, 0, 0, 0, 1,$i),
('<p>(B) Teach a short course on real estate taxes to new homeowners.</p>', -1, 0, 0, 0, 0, 1, $i);";
//mysql_query($query);	
}
*/
?>