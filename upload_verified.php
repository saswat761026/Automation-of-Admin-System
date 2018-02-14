<?php
require 'db.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (!file_exists('img/'.$phoneno)) {
    mkdir('img/'.$phoneno, 0777, true);
}

 $file_name = $_FILES['fileupload']['name'];
 $file_loc =  $_FILES['fileupload']['tmp_name'];
 $file_size = $_FILES['fileupload']['size'];
 $file_type = $_FILES['fileupload']['type'];
 $file_store="img/$phoneno/".$file_name;
    if (move_uploaded_file($file_loc,$file_store)) {
        //$_SESSION['message']="The file ". basename( $_FILES["fileupload"]["name"]). " has been uploaded.";
        //header("location:success.php");
$name = $_SESSION['name'];
$email = $_SESSION['email'];  
$id = $_SESSION['id'];  
$sid = $_SESSION['senior_id'];
$semail = $_SESSION['senior_email'];
$phoneno = $_SESSION['phoneno'];
$leave_type = $_SESSION['leave_type'];
$from_date = $_SESSION['from_date'];
$reason = $_SESSION['reason']; 
$to_date = $_SESSION['to_date'];  
$applied_date = date("Y-m-d h:i:sa");
$dept = $_SESSION['dept'];
$photo_id = mt_rand();
$sql = "INSERT INTO `leave`(`id`, `name`, `dept`, `from_date`, `to_date`, `senior_id`, `senior_email`, `leave_type`, `reason`, `applied_on`, `file_name`, `file_contain_name`, `file_type`, `file_size`, `photo_id`) VALUES ('$id','$name','$dept','$from_date','$to_date','$sid','$semail','$leave_type','$reason','$applied_date','$phoneno','$file_name','$file_type','$file_size','$photo_id');";
   if(mysqli_query($con,$sql)){

$result = mysqli_query($con,"SELECT * FROM `leave` WHERE photo_id=$photo_id");
$user = $result->fetch_assoc();
$_SESSION['request_id'] = $user['request_id'];
$request_id = $_SESSION['request_id'];
$_SESSION['message'] = 
	"Hello $name, your request id is $request_id. Kindly note it down for future reference.
	And you your request is sent to your senior id i.e, $semail.";

$result1 = mysqli_query($con,"SELECT `id`, `password`, `hash`, `name`, `dob`, `gender`, `post`, `dept`, `senior_id`, `senior_email`, `email`, `phoneno`, `active`, `el`, `cl`, `rh` FROM `main` WHERE id=$sid");
$user1 = $result1->fetch_assoc();
$_SESSION['sname'] = $user1['name'];
$sname = $_SESSION['sname'];
$sql1 = "INSERT INTO `transcation`(`request_id`, `senior_name`, `from_email`, `to_email`) VALUES ('$request_id','$sname','$email','$semail')";
mysqli_query($con,$sql1);
   header('location:success.php');
	$to = $semail;
	$subject = 'Leave Request';
	$message_body='
	Hello sir,
	I am '.$name.'of'.$dept.'I would like to inform you that i would like to have holiday form '.$from_date.' to '.$to_date.'. You can find the link to form below.
	http://localhost/leave_authentication.php?email='.$email.'&photoid'.$photo_id;
	mail($to,$subject,$message_body); 
	header('location:success.php');
	

}
else{
	$_SESSION['message'] = 'Something went wrong'; 
	header('location:error.php');
}   
}
else{
	$_SESSION['message'] = 'Something went wrong'; 
	header('location:error.php');
}   

       
?>