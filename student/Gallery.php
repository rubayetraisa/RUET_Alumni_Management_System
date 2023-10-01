<?php
include "Navbar.php";
include "Connect.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style6.css">
    
    <title>Alumni Management System</title>
</head>

<body>

<div class="container">
    
    <h3>Gallery</h3>
    <hr style="width:20%;text-align:center; margin-left:520px; height:2px;background-color: black;border-radius: 5px;opacity:80%">
    <div class="row r2">
        <div class="list_gallery">
            <?php

            $sql="Select * from gallery";
            $images=$con->query($sql);

            while($image= $images->fetch_assoc()){
                
            ?>
            <div class="col-sm-3 img-section" style="float: left">
                <a class="thumbnail fancybox" rel="lightbox" href="admin/images/<?php echo $image['image'] ?>">
                 <img class="img-thumbnail" alt="error loading image" src="admin/images/<?php echo $image['image'] ?>" /> 
                <div class="text-center">
                    <strong class="text-muted t"><?php echo $image['title'] ?></strong>
                </div>
              </a>
              </div>
            
            <?php  } ?>
          </div>
  
      </div>
</div>
</body>
</html>