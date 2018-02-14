 <?php
   require 'db.php';
   session_start(); 
   $page_title='Status';
   $page_name="Status Portol";
   include('includes/header_model.html');
   if ( $_SESSION['logged_in'] != 1 ) {
   $_SESSION['message'] = "You must log in before viewing your profile page!";
   header("location: error.php");    
   }
  ?>
 <form action="get_status.php" method="post">
<fieldset><legend><h1>TO Know The Status of Your Application</h1></legend>	
<p><label>Request ID: <input type="text" name="request" size="30" maxlength="50"/></label></p>
</fieldset>
<p>
<button class="button" align="right" type="submit"><span>Get Status</span></button>	
</p>  
 <?php 
 include('includes/footer_model.html');
?>