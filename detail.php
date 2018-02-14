
<?php
   require 'db.php';
   session_start();

   $first_name = $_SESSION['name'];
    $email = $_SESSION['email'];   
   $result = mysqli_query($con,"SELECT * FROM main WHERE email='$email'");
     $user = $result->fetch_assoc();
    $_SESSION['id']=$user['id'];
    $_SESSION['name']=$user['name'];
    $_SESSION['gender']=$user['gender'];
    $_SESSION['post']=$user['post'];
    $_SESSION['dept']=$user['dept'];
    $_SESSION['dob']=$user['dob'];
    $_SESSION['senior_id']=$user['senior_id'];
    $_SESSION['senior_email']=$user['senior_email'];
    $_SESSION['phoneno']=$user['phoneno'];
    $_SESSION['el']=$user['el'];
    $_SESSION['cl']=$user['cl'];
    $_SESSION['rh']=$user['rh'];
    $id=$_SESSION['id'];
    $gender=$_SESSION['gender'];
    $post=$_SESSION['post'];
    $dept=$_SESSION['dept'];
    $dob=$_SESSION['dob'];
    $senior_id=$_SESSION['senior_id'];
    $senior_email=$_SESSION['senior_email'];
    $phoneno=$_SESSION['phoneno'];
    $el=$_SESSION['el'];
    $cl=$_SESSION['cl'];
    $rh=$_SESSION['rh'];
    
?>
<?php 
   $page_title='Login';
   $page_name = '';
   include('includes/header_model.html');
  ?>
<fieldset>
<h3>Your Details</h3>
 <p><b>Name: <?php echo "$first_name";?></b></p>
 <p><b>Employee Id: <?php echo "$id";?></b></p>
 <p><b>Date Of Birth: <?php echo "$dob";?></b></p>
 <p><b>Gender: <?php echo "$gender";?></b></p>
 <p><b>Post: <?php echo "$post";?></b></p>
 <p><b>Department: <?php echo "$dept";?></b></p>
 <p><b>Email: <?php echo "$email";?></b></p>
 <p><b>Phone No.: <?php echo "$phoneno";?></b></p>
 <p><b>Senior's Employee Id: <?php echo "$senior_id";?></b></p>
 <p><b>Senior's E-mail: <?php echo "$senior_email";?></b></p>
 <p><b>Remaining Earned Leave:<?php echo "$el";?></b></p>
 <p><b>Remaining Casual Leave: <?php echo "$cl";?></b></p>
 <p><b>Remaining Restricted Holidays: <?php echo "$rh";?></b></p> 
</fieldset>
<a href="profile.php"><button id="button" class="button button-block" name="detail"><span>Back</span></button></a>
   <?php 
 include('includes/footer_model.html');
?>