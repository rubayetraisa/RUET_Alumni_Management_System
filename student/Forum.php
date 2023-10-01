<?php
include "Navbar.php";
include "Connect.php";

session_start();
$roll = $_SESSION['r'];
$sql3 = "Select Name from `alumni_side` where Roll=$roll;";
$user = mysqli_fetch_assoc(mysqli_query($con, $sql3));
$n=$user['Name'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/style5.css">
    <title>Alumni Management System</title>
</head>

<body class="bdy">
<h3>Forum</h3>
       <hr>
    <div class="cont">
       
    <div class="btn1">
    <a href="forum_post.php">  <button class="btn btn-primary newbtn"><b>+ New Post</b></button> </a>
    </div>
    <div class="t">
        <table class="table">
  <thead>
    <tr>
      <th scope="col" class="heading">User Name</th>
      <th scope="col" class="heading">Topic Name</th>
      <th scope="col" class="heading">Discussion</th>
      <th scope="col" class="heading">Date Posted</th>
      <th scopr="col" class="heading">      </th>
      
    </tr>
  </thead>
  <tbody>

  <?php

$sql="Select id,username,topic,discussion,date from `forum` order by date desc";
$result=mysqli_query($con,$sql);
if($result){
    
    while($row=mysqli_fetch_assoc($result)){

        $id=$row['id'];
        $name=$row['username'];
        $topic=$row['topic'];
        $details=$row['discussion'];
        $date=$row['date'];
        
        
        
        if($name==$n)
        {
          echo '<tr">
        
          <td class="heading">'.$name.'</td>
          <td class="heading">'.$topic.'</td>
          <td class="dt">'.$details.'</td>
          <td class="heading">'.$date.'</td>
          <td class="heading">
          <button class="btn btn-primary btnop"><a href="Update_forum.php? update='.$id.'" class="text-light link">Update</a></button>
          <button class="btn btn-danger btnop"><a href="Delete_forum.php? delete='.$id.'" class="text-light link">Delete</a></button>
          </td>          
          </tr>';
      
        }
        else{
        echo '<tr">
        
            <td class="heading">'.$name.'</td>
            <td class="heading">'.$topic.'</td>
            <td class="dt">'.$details.'</td>
            <td class="heading">'.$date.'</td>
            <td class="heading">
            
            </td>          
            </tr>';
        } 
        
    }
}

  ?>  

 
  </tbody>
</table>
</div>
    </div>
</body>
</html>