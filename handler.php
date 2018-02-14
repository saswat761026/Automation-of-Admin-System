<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_REQUEST['login'])) { //user logging in
           require 'verify_login.php';   
    }
    else if (isset($_REQUEST['signup'])) { //user registering
        require 'registration.php';
    }
}
?>