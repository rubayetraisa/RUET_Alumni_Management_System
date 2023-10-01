<?php
include "admin_connect.php";
include "admin_navbar.php";

$id=$_GET['update'];
$sql="Select * from `forum` where id=$id";
$result=mysqli_query($con,$sql);

$row=mysqli_fetch_assoc($result);

      $id=$row['id'];
      $name=$row['username'];

        $topic=$row['topic'];
        $details=$row['discussion'];
        $date=$row['date'];

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $topic=$_POST['topic'];
    $details=$_POST['details'];
    

    $sql="update `forum` set username='$name',topic='$topic',discussion='$details' where id=$id";
    
    $result=mysqli_query($con,$sql);
    if($result)
    {
        ?>
        <script type="text/javascript">
          alert("Updated successfully");
        </script> 
        <?php
        header('location:admin_forum.php');
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
    <h3 class="forum">Forum</h3>
    <hr class="fline">
    <div class="container">
        <div class="row hg r1">
            <div class="col-md-3"></div>
            <div class="col-md-6 c1">

                <form method="Post" class="f1">
                    <div class="mb-3 text-box">
                        <label for="exampleInputUser" class="form-label">User Name</label>
                        <input type="name" name="name" value="<?php echo $name; ?>" autocomplete="off" class="form-control" id="exampleInputUser" aria-describedby="UserHelp" readonly>

                    </div>

                    <div class="mb-3 text-box">
                        <label for="exampleInputTopic" class="form-label">Topic Name</label>
                        <input type="text" name="topic" value="<?php echo $topic; ?>" autocomplete="off" class="form-control" id="exampleInputTopic" aria-describedby="TopicHelp" required>

                    </div>

                    <div class="mb-3 text-box">
                        <label for="exampleInputDetails" class="form-label">Discussion</label>
                        <textarea type="text" rows="8"  name="details" autocomplete="off" class="form-control" id="exampleInputDetails" aria-describedby="DetailsHelp" required><?php echo $details; ?></textarea>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary updt"><strong>Update</strong></button>
            </div>
            <div class="col-md-3"></div>
            
        </div>
       
    </div>
    
</body>

</html>