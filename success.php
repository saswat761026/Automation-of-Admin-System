
<?php
        session_start(); 
    
?>

<?php 
   $page_title='Success';
   $page_name = '';
   include('includes/header_model.html');
  ?>
<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];    
    else:
        header( "location: profile.php" );
    endif;
    ?>
    </p>
    <a href="profile.php"><button class="button button-block"/>Home</button></a>
    <a href="logout.php"><button class="button button-block"/>Logout</button></a>
</div>
 <?php 
 include('includes/footer_model.html');
?>