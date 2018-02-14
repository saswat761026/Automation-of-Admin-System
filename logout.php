<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<?php 
   $page_title='Login';
   $page_name ='';
   include('includes/header_model.html');
  ?>
    <div class="form">
          <h1>Have A Great Day!</h1>
              
          <p><b><?= 'You have been logged out! Thank You.'; ?></b></p>
          
          <a href="login.php"><button class="button button-block"/>Home</button></a>

    </div>

<?php 
 include('includes/footer_model.html');
?>