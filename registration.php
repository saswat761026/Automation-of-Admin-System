 <?php 
   $page_title='Registration';
   $page_name="Registration Portol";
   include('includes/header_model.html');
  ?>
<form action="registration_in.php" method="post">
<fieldset><legend><h1>Enter your info</h1></legend>	
<p><label>Name: <input type="text" name="name" size="30" maxlength="50"/></label></p>
<p><label>Password: <input type="password" name="pass" size="10" maxlength="10"/></label></p>
<p><label>Date Of Birth: <input type="date" name="date"/></label></p>
<p><label>Post: <input type="text" name="post" size="30" maxlength="50"/></label></p>
<p><label>Department: <input type="text" name="dept" size="30" maxlength="50"/></label></p>
<p><label>Senior Id: <input type="text" name="sid" size="30" maxlength="50"/></label></p>
<p><label>Senior Email: <input type="text" name="semail" size="30" maxlength="50"/></label></p>
<p><label for="type">Gender:</label> 
<input type="radio" name="type" value="M"> Male
<input type="radio" name="type" value="F"> Female
</p>
<p><label>E-mail: <input type="text" name="email" size="30" maxlength="50"/></label></p>
<p><label>Phone No.: <input type="text" name="phone" size="30" maxlength="50"/></label></p> 
</fieldset>
<p>
<button class="button" align="right" type="submit"><span>Register</span></button>	
</p>
<?php 
 include('includes/footer_model.html');
?>