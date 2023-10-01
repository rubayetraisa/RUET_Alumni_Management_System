<?php
include "admin_connect.php";
include "admin_navbar.php";

if(isset($_GET['delete'])){
   $roll=$_GET['delete'];

   $sql="delete from `alumni_side` where Roll=$roll";
   $result=mysqli_query($con,$sql);
   if($result){
    // echo "Deleted successfully";
    header('location:admin_alumni.php');
   }
   else
   {
    die(mysqli_error($con));
   }

}


?>