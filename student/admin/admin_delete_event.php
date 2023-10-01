<?php
include "admin_connect.php";
include "admin_navbar.php";
if(isset($_GET['delete'])){
   $id=$_GET['delete'];

   $sql="delete from `event` where id=$id";
   $result=mysqli_query($con,$sql);
   if($result){
    // echo "Deleted successfully";
    header('location:admin_events.php');
   }
   else
   {
    die(mysqli_error($con));
   }

}


?>