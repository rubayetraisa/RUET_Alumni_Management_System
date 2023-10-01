<?php
include "admin_connect.php";
include "admin_navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/style4.css">
    <title>Alumni Management System</title>
</head>

<body>
<h3>Events</h3>
       <hr>
    <div class="container">

    <div class="btn1">
    <a href="admin_event_post.php">  <button class="btn btn-primary newbtn"><b>+ New Post</b></button> </a>
    </div>

        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Date of Event</th>
      <th scope="col">Event Name</th>
      <th scope="col">Details</th>
      <th scope="col">Event Status</th>
      <th scope="col" class="heading">      </th>
      
    </tr>
  </thead>
  <tbody>

  <?php

$sql="Select id,name,details,date,time from `event` order by date desc";
$result=mysqli_query($con,$sql);
if($result){
    
    while($row=mysqli_fetch_assoc($result)){

       $id=$row['id'];
        $name=$row['name'];
        $details=$row['details'];
        $date=$row['date'];
        $t=$row['time'];
       
        if($t>=0)
        {
            echo '<tr class="table-success">
        
            <td>'.$date.'</td>
            <td>'.$name.'</td>
            <td>'.$details.'</td>
            <td><b> Upcoming </b></td>
            <td class="heading">
           <button class="btn btn-primary btnop"><a href="admin_update_event.php? update='.$id.'" class="text-light link">Update</a></button>
           <button class="btn btn-danger btnop"><a href="admin_delete_event.php? delete='.$id.'" class="text-light link">Delete</a></button>
           </td> 

          </tr>';
        }
        else
        {
            echo '<tr class="table-danger">
        
            <td>'.$date.'</td>
            <td>'.$name.'</td>
            <td>'.$details.'</td>
            <td><b> Past</b> </td>
            <td class="heading">
           <button class="btn btn-primary btnop"><a href="admin_update_event.php? update='.$id.'" class="text-light link">Update</a></button>
           <button class="btn btn-danger btnop"><a href="admin_delete_event.php? delete='.$id.'" class="text-light link">Delete</a></button>
           </td> 
          </tr>';
        }
    }
}

  ?>
   
   

 
  </tbody>
</table>
    </div>
</body>
</html>