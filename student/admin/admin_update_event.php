<?php
include "admin_connect.php";
include "admin_navbar.php";

$id=$_GET['update'];
$sql="Select * from `event` where id=$id";
$result=mysqli_query($con,$sql);

$row=mysqli_fetch_assoc($result);

      $id=$row['id'];
      $name=$row['name'];
      $details=$row['details'];
      $date=$row['date'];

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $details=$_POST['details'];
    $date=$_POST['date'];

    $sql="update `event` set name='$name',details='$details',date='$date' where id=$id";
    
    $result=mysqli_query($con,$sql);
    if($result)
    {
        ?>
        <script type="text/javascript">
          alert("Updated successfully");
        </script> 
        <?php
        header('location:admin_events.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}


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

<body>
    <h3 class="forum">Events</h3>
    <hr class="fline">
    <div class="container">
        <div class="row hg r1">
            <div class="col-md-3"></div>
            <div class="col-md-6 c1">

                <form method="Post" class="f1">
                    <div class="mb-3 text-box">
                        <label for="exampleInputUser" class="form-label">Event Name</label>
                        <input type="name" name="name" value="<?php echo $name; ?>" autocomplete="off" class="form-control" id="exampleInputUser" aria-describedby="UserHelp" required>

                    </div>
                    <div class="mb-3 text-box">
                        <label for="exampleInputDetails" class="form-label">Date(YYYY-MM-DD)</label>
                        <input type="date" name="date" value="<?php echo $date; ?>"  autocomplete="off" class="form-control" id="exampleInputUser" aria-describedby="UserHelp" required>

                    </div>

                    <div class="mb-3 text-box">
                        <label for="exampleInputDetails" class="form-label">Details</label>
                        <textarea type="text" rows="8" name="details" autocomplete="off" class="form-control" id="exampleInputDetails" aria-describedby="DetailsHelp" required><?php echo $details; ?></textarea>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary pst"><strong>Update</strong></button>
            </div>
            <div class="col-md-3"></div>
            
        </div>
       
    </div>
</body>

</html>