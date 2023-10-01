<?php
 session_start();
include "admin_navbar.php";
include "admin_connect.php";



if(isset($_POST)&& !empty($_POST['id'])){
  
   $sql_select="Select image from gallery where id=".$_POST['id'];
   $select_result=$con->query($sql_select);
   $row=$select_result->fetch_row();
   $image_name= $row[0];

   $unl=unlink("images/".$image_name);

   $sql="Delete from gallery where id=".$_POST['id'];
   $con->query($sql);

   $_SESSION['success']="Image Deleted Successfully";
   header("Location:admin_gallery.php");
}
else
{
    $_SESSION['error']="Please Select Image Or Write Title";
    header("Location:admin_gallery.php"); 
}

?>