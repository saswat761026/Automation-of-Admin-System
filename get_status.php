<?php
   require 'db.php';
   session_start(); 
   if ( $_SESSION['logged_in'] != 1 ) {
   $_SESSION['message'] = "You must log in before viewing your profile page!";
   header("location: error.php");    
   }
   $rid = $_POST['request'];
   $result = mysqli_query($con,"SELECT `transaction_id`, `request_id`, `senior_name`, `from_email`, `to_email` FROM `transcation` WHERE request_id=$rid");
   $user = $result->fetch_assoc();
   $sname = $user['senior_name'];
   $_SESSION['message'] = 'Your application with '.$sname;
   header('location:success.php');
   
  ?>