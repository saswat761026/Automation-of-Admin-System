<?php
require 'db.php';
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 
        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        $email = mysql_real_escape_string(test_input($_POST['email']));
        $hash = mysql_real_escape_string(test_input($_POST['hash']));
        $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";
        if ( mysqli_query($con,$sql) ) {
        $_SESSION['message'] = "Your password has been reset successfully!";
        header("location: success.php");    
        }

    }
    else {
        $_SESSION['message'] = "Two passwords you entered don't match, try again!";
        header("location: error.php");    
    }

}
?>