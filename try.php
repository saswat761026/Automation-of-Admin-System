<?php
require 'db.php';
session_start();
?>
<html>
<head>Trial</head>
<body>
<div class="container">   
<form class="form" method="post" action="verifi.php">
<fieldset><legend><h1>Login below:</h1></legend>
<p><label>E-mail: <input type="text" name="email" size="30" maxlength="50"/></label></p>
<p><label>Password: <input type="password" name="pass" size="10" maxlength="10"/></label></p>
</fieldset>
<p>
<button class="button" align="right" type="submit" name="login"><span>login<span></span></button>	
</p>
<p>
<button class="button" align="left" type="submit" name="signup"><span>sign up</span></button>
</p>
</form>
</body>
</html>
