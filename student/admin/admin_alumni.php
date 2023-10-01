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
       <h2>Alumni Information</h2>
       <hr>
    <div class="container">
       
        <table class="table">
  <thead>
    <tr>
       <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Company</th>
      <th scope="col">Country</th>
      <th scope="col">Designation</th>
      <th scope="col">    </th>
    </tr>
  </thead>
  <tbody>

  <?php

$sql="Select * from `alumni_side` ";
$result=mysqli_query($con,$sql);
if($result){
    
    while($row=mysqli_fetch_assoc($result)){

        $roll=$row['Roll'];
        $image=$row['image'];
        $name=$row['Name'];
        $email=$row['Email'];
        $phone=$row['phone'];
        $company=$row['company'];
        $country=$row['country'];
        $designation=$row['designation'];

        echo '<tr>
        <th scope="row">'?><img src="images/<?php echo $image; ?>" class="img-top" alt="No Image" title="<?php echo $image; ?>"><?php echo'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$phone.'</td>
        <td>'.$company.'</td>
        <td>'.$country.'</td>
        <td>'.$designation.'</td>
        <td class="heading">
          <button class="btn btn-primary btnop2"><a href="delete_alumni.php? delete='.$roll.'" class="text-light link">Delete</a></button>
          </td>
      </tr>';
    }
}

  ?>
   
   

 
  </tbody>
</table>
    </div>
</body>
</html>