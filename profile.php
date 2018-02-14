<?php
require 'db.php';
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
   // $_SESSION['id']=$_POST['id'];
    //$id=$_SESSION['id'];
}
?>
<?php 
   $page_title='Login';
   $page_name="Your Profile";
   include('includes/header_model.html');
  ?> 
<div class="form">
          <p>
           <h1>Welcome!</h1>  
          <?php 
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          <?php
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          ?>   
     <fieldset>
       <b>Hi,</b> 
       <p><b><?php echo "$first_name";?>
        You Can find all opption below!
        </b></p>
     </fieldset>     
     </div>
     <div>
    <a href="personal.php"><button id="button" class="button button-block" name="personal"><span>Personal Record</span></button></a>
    <a href="leave.php"><button id="button" class="button button-block" name="leave"><span>Leave Portal</span></button></a>
    <a href="sell/buy.php"><button id="button" class="button button-block" name="sell_buy"><span>Sell/Buy Portal</span></button></a>
    <a href="logout.php"><button id="button" class="button button-block" name="logout"><span>Log Out</span></button></a>
    <!--<a href="upload.php"><button id="button" class="button button-block" name="upload"><span>Upload Sign </span></button></a>-->
    </div>
    <?php 
 include('includes/footer_model.html');
?>