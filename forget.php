<?php 
require 'db.php';
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $_POST['email'];
    $result = mysqli_query($con,"SELECT * FROM main WHERE email='$email';");
    if ( $result->num_rows == 0 )
    {    
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else { 

        $user = $result->fetch_assoc(); 
        $email = $user['email'];
        $hash = $user['hash'];
        $name = $user['name'];
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";


        $to      = $email;
        $subject = 'Password Reset Link ( clevertechie.com )';
        $message_body = '
        Hello '.$first_name.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/login-system/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<?php 
   $page_title='Reset';
   include('includes/header_model.html');
  ?>   
  <div class="form">
    <h1>Reset Your Password</h1>
    <form action="forget.php" method="post">
     <div class="field-wrap">
      <label>
        Email Address<span class="req">*</span>
      </label>
      <input type="email"required autocomplete="off" name="email"/>
    </div>
    <button class="button button-block"/>Reset</button>
    </form>
  </div>
  <?php 
 include('includes/footer_model.html');
?>    
