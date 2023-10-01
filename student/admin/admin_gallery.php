<?php
include "admin_navbar.php";
include "admin_connect.php";

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
    <form action="imageupload.php" class="img-up" method="POST" enctype="multipart/form-data">
        <?php if(!empty($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <strong>
                    Wrong input!
                </strong>
                <br><br>
                <ul>
                    <li><?php echo $_SESSION['error'];?></li>
                </ul>
            </div>
           <?php unset($_SESSION['error']);


        } ?>

        <?php if(!empty($_SESSION['success'])) { ?>
            <div class="alert alert-primary">
              <!-- <button tyoe="button" class="close" 
               data-dismiss="alert">x</button> -->
               <strong><?php echo $_SESSION['success'];?></li>
            </div>
           <?php unset($_SESSION['success']);


        } ?>

        <div class="row">
            <div class="col-md-5">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="title">
            </div>
            <div class="col-md-5">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-2">
                <br>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>    
    </form>
    
    <div class="row r2">
        <div class="list_gallery">
            <?php

            $sql="Select * from gallery";
            $images=$con->query($sql);

            while($image= $images->fetch_assoc()){
                
            ?>
            <div class="col-sm-3 img-section" style="float: left">
                <a class="thumbnail fancybox" rel="lightbox" href="images/<?php echo $image['image'] ?>">
                 <img class="img-thumbnail" alt="error loading image" src="images/<?php echo $image['image'] ?>" /> 
                <div class="text-center">
                    <strong class="text-muted t"><?php echo $image['title'] ?></strong>
                </div>
              </a>


              <form action="imageDelete.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $image['id'] ?>">
                <button type="submit" title="delete" class="close-icon btn btn-danger">
                    <i class="glyphicon glyphicon-remove"></i>Delete
                </button>
                
              </form>


            </div>
            
          <?php  } ?>
        </div>

    </div>


</div>
</body>
</html>

<script type="text/javasript">
    $(document).ready(function(){
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none",
         } );

    });

</script>
