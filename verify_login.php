 
<?php
require "db.php";
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 
$email=mysql_real_escape_string(test_input($_POST['email']));
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $_SESSION['message']=$emailErr; 
    }
$result = mysqli_query($con,"SELECT * FROM main WHERE email='$email'");
//$pass_got = mysqli_query($con,"SELECT password FROM main WHERE email='$email'");
if($result->num_rows==0){
$_SESSION['message']="User with that email doesn't exist!";
header("location: error.php");	
}
else{
	   $user = $result->fetch_assoc();
		if(password_verify($_POST['pass'],$user['password'])){
		$_SESSION['email']=$user['email'];
		$_SESSION['name']=$user['name'];
		$_SESSION['active']=$user['active'];
		$_SESSION['logged_in']=true;
		header("location:profile.php");
	}
	else{
		$_SESSION['message']="You have entered worng password!";
		require "error.php";

	}

}

?>
