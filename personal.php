<?php
require 'db.php';
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    $first_name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<?php 
   $page_title='Login';
   $page_name="Your Profile";
   include('includes/header_model.html');
  ?> 
<div>
<fieldset>
	<b>Hi,</b>
	<p><b><?php echo "$first_name"; ?>
	Here you can find your all personal details. 	
	</b></p>
</fieldset>
<a href="detail.php"><button id="button" class="button button-block" name="detail"><span>Detail</span></button></a>
<a href="personal_property.php"><button id="button" class="button button-block" name="personal_prop"><span>Personal Property</span></button></a>
</div>
<?php 
 include('includes/footer_model.html');
?>