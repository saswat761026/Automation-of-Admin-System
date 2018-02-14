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
   $page_name="Leave Portol";
   include('includes/header_model.html');
?>
<div>
	<p><b>Hi <?php echo "$first_name";?>,
     Your remaining leave are: 
	</b></p>
<?php	    
$result = mysqli_query($con,"SELECT * FROM main WHERE email='$email'");
$user = $result->fetch_assoc();
$_SESSION['el'] = $user['el'];
$_SESSION['cl'] = $user['cl'];
$_SESSION['rh'] = $user['rh'];
$el = $_SESSION['el'];
$cl = $_SESSION['cl'];
$rh = $_SESSION['rh'];
?>
<p><b>Earned Leave = <?php echo "$el";?></b></p>
<p><b>Casual Leave = <?php echo "$cl";?></b></p>
<p><b>Restricted Holiday = <?php echo "$rh";?></b></p>
</div>	
<div>
	   <a href="status.php"><button id="button" class="button button-block" name="see_status"><span>Status</span></button></a>
	    <a href="leave_form.php"><button id="button" class="button button-block" name="leave_form"><span>Leave Form</span></button></a>

</div>	
<?php 
 include('includes/footer_model.html');
?>  