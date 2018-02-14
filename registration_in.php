
<?php
require 'db.php';
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
$_SESSION['email']=$_POST['email'];
$_SESSION['pass']=$_POST['pass'];
$_SESSION['name']=$_POST['name'];
$_SESSION['dept']=$_POST['dept'];
$_SESSION['dob']=$_POST['date'];
$_SESSION['post']=$_POST['post'];
$_SESSION['phone']=$_POST['phone'];
$_SESSION['semail']=$_POST['semail'];

$name=mysql_real_escape_string(test_input($_POST['name']));
$pass=mysql_real_escape_string(test_input(password_hash($_POST['pass'],PASSWORD_BCRYPT)));
//$pass=mysql_real_escape_string(test_input($_POST['pass']));
$hash=mysql_real_escape_string(test_input(md5(rand(0,1000))));
$dob=mysql_real_escape_string(test_input($_POST['date']));
$post=mysql_real_escape_string(test_input($_POST['post']));
$dept=mysql_real_escape_string(test_input($_POST['dept']));
$sid=mysql_real_escape_string(test_input($_POST['sid']));
$gender=mysql_real_escape_string(test_input($_POST['type']));
$phone=mysql_real_escape_string(test_input($_POST['phone']));
$email=mysql_real_escape_string(test_input($_POST['email']));
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $_SESSION['message']=$emailErr; 
    }
$semail=mysql_real_escape_string(test_input($_POST['semail']));
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $_SESSION['message']=$emailErr; 
    }

$result = mysqli_query($con,"SELECT * FROM main WHERE email='$email;");
if($result->num_rows > 0){
	$_SESSION['message']="User Exist";
	header('location:error.php');
}
else{
	$sql="INSERT INTO `main`(`password`,`hash`,`name`,`dob`, `gender`,`post`,`dept`,`senior_id`, `senior_email`,`email`,`phoneno`) VALUES ('$pass','$hash','$name','$dob','$gender','$post','$dept','$sid','$semail','$email','$phone');";
	if(mysqli_query($con,$sql)){
		$_SESSION['active'] = 0;
		$_SESSION['logged_in'] = true;
		$_SESSION['message']=
		      "Hello $name, your confirmation link has been sent to this e-mail $email. Please verify account by clicking on the link in the message!.";
		$to = $email;
		$subject ='Account Verification';
		$message_body='
		Hello '.$name.',
		Thank you for signing up!
		Please click on the link to activate your account:
		http://localhost/authentication.php?email='.$email.'&hash'.$hash;
		mail($to,$subject,$message_body);
		header("location:profile.php");

	}
	else{
		$_SESSION['message'] = 'Registration failed';
		header("location:error.php");
	}

}


?>