<?php
include "Navbar.php";
include 'Connect.php';
if(isset($_GET['delete'])){
   $id=$_GET['delete'];

   $sql="delete from `forum` where id=$id";
   $result=mysqli_query($con,$sql);
   if($result){
    // echo "Deleted successfully";
    header('location:forum.php');
   }
   else
   {
    die(mysqli_error($con));
   }

}


?>