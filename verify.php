<?php  
require 'db.php';
session_start();

  $page_title='Application';
   $page_name="Leave Form";
   include('includes/header_model.html');
   if ( $_SESSION['logged_in'] != 1 ) {
 $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];   
} 

  $flag = 0;
 $result = mysqli_query($con,"SELECT * FROM main WHERE email='$email'");
	    $user = $result->fetch_assoc();
    $_SESSION['id'] = $user['id'];  
		$_SESSION['senior_id']=$user['senior_id'];
		$_SESSION['senior_email']=$user['senior_email'];
    $_SESSION['phoneno']=$user['phoneno'];
    $_SESSION['dept']=$_POST['dept'];
	  $phoneno = $_SESSION['phoneno'];
    $_SESSION['leave_type'] = $_POST['leave_type'];
	  $_SESSION['from_date'] = $_POST['from_date'];
    $_SESSION['reason'] = $_POST['reason'];
    $_SESSION['to_date'] = $_POST['to_date'];

$date1 = strtotime($_POST['from_date']);
$date2 = strtotime(date('m/d/y'));
if($date1 > $date2){
 $flag = 1; 
$_SESSION['from_date'] = $_POST['from_date'];
}
else{
 $flag = 0; 
 $_SESSION['message'] = 'Enter a valid date.<a href ="leave_form.php">Click here</a>Try again';
		header("location: error.php");
 }
 $date3 = strtotime($_POST['to_date']);
 if($date3 > $date2 && $date1 < $date3){
  $flag = 1;
  $_SESSION['to_date'] = $_POST['to_date'];
 }
 else{
  $flag = 0;
 	$_SESSION['message'] = 'Enter a valid date. <a href ="leave_form.php">Click here</a> Try again';
		header("location: error.php");
 }
 $_SESSION['dept'] = $_POST['dept'];
 if($flag == 1){
 require('upload_verified.php');
 }
 ?>

