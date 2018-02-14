
<?php 
require 'db.php';
session_start();
 if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");}  
  else {
    $first_name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    
}  

?>
<?php 
   $page_title='Application';
   $page_name="Leave Form";
   include('includes/header_model.html');
  ?>  
<form action="verify.php" method="post" enctype="multipart/form-data">
<fieldset><legend><h1>Apply Leave Here</h1></legend>	
<p><label>Name: <input type="text" name="name" size="30" maxlength="50"/></label></p>
<p><label>Id: <input type="text" name="id" size="10" maxlength="10"/></label></p>
<p><label>E-mail: <input type="email" name="email" size="30" maxlength="50"/></label></p>
<p><label>Leave Type (use EL/CL/RH): <input type="text" name="leave_type" size="30" maxlength="50"/></label></p>
<p><label>From Date:  <input type="date" name="from_date"/></label></p>
<p><label>To Date: <input type="date" name="to_date"></label></p>
<p><label>Department: <input type="text" name="dept" size="30" maxlength="50"/></label></p>
<p><label>Reason: <input type="textarea" name="reason" rows="4" cols="50"></label></p> 
<p><label>Upload(if any)<input type="file" name="fileupload"></label></p> 
</fieldset>
<p>
<button class="button" align="right" type="submit"><span>Send</span></button>
</p>
<?php 
 include('includes/footer_model.html');
?>