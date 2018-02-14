 
<?php
require 'db.php';
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
	$email = mysql_real_escape_string(test_input($_GET['email']));
	$hash =  mysql_real_escape_string(test_input($_GET['hash']));
	$result = mysqli_query("SELECT * FROM main WHERE email='$email' AND hash='$hash' AND active='0'");
	if($result->num_rows == 0){
		$_SESSION['message'] = "Account is already been activated or the URL is invalid";
		header("location: error.php");
	}
	else
	{
		$_SESSION['message'] = "Your account has been activated";
		mysqli_query($con,"UPDATE main SET active = 1 WHERE email=$email");
		$_SESSION['active']=1;
		header("location:success.php");
	}
}
else{
	$_SESSION['message']="Invalid parameters provided for account verification!";
	header("location: error.php");
}
?>