<?php

require 'db.php';
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = mysqli_real_escape_string(test_input($_GET['email'])); 
    $hash = mysqli_real_escape_string(test_input($_GET['hash'])); 
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");  
}
?>
<?php 
   $page_title='Reset Password';
   include('includes/header_model.html');
  ?> 
  <div class="form">
          <h1>Choose Your New Password</h1>
          <form action="reset_password.php" method="post">
          <div class="field-wrap">
            <label>
              New Password<span class="req">*</span>
            </label>
            <input type="password"required name="newpassword" autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Confirm New Password<span class="req">*</span>
            </label>
            <input type="password"required name="confirmpassword" autocomplete="off"/>
          </div>
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $hash ?>">    
          <button class="button button-block"/>Apply</button>
          </form>
    </div>
<?php 
 include('includes/footer_model.html');
?>     
