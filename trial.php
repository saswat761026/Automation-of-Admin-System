<?php 
$target_dir = "img/$phoneno/";
$target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        $_SESSION['message'] = "File is not an image.";
        header('location:error.php');
        
    }
}
// Check file size
if ($_FILES["fileupload"]["size"] > 200000) {
    $_SESSION['message'] = "Sorry, your file is too large.";
    $uploadOk = 0;
   header("location:error.php");
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
    $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed.";
    $uploadOk = 0;
    header("location:error.php");
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $_SESSION['message'] =  "Sorry, your file was not uploaded.";
  header("location:error.php");
  echo "wrong format";
} else {
    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
        $uploadok = 1;
        //$_SESSION['message']="The file ". basename( $_FILES["fileupload"]["name"]). " has been uploaded.";
        //header("location:success.php");
        if($uploadok==1){
         require('upload_db.php');
         }
    } else {

        $_SESSION['message']="Sorry, there was an error uploading your file.";
        header("location:error.php");
    }

?>