<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php 
   $page_title='Error';
   $page_name="";
   include('includes/header_model.html');
  ?> 
<div class="form">
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ){
        echo $_SESSION['message'];
        $_SESSION['message'] = NULL;    
    }
    else{
        echo "error unauthorized access";
    }
    ?>
    </p>     
    <a href="profile.php"><button class="button button-block"/>Home</button></a>
</div>
 <?php 
 include('includes/footer_model.html');
?>
