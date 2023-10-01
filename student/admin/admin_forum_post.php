<?php
include "admin_connect.php";
include "admin_navbar.php";

if(isset($_POST['postit'])){
    mysqli_query($con,"insert into `forum` (username,topic,discussion,date)
    values('Admin','$_POST[topic]','$_POST[details]',curdate());");

    header('location:admin_forum.php');
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
                        <input type="name" name="name" value="Admin" autocomplete="off" class="form-control" id="exampleInputUser" aria-describedby="UserHelp" readonly>

                    </div>

                    <div class="mb-3 text-box">
                        <label for="exampleInputTopic" class="form-label">Topic Name</label>
                        <input type="text" name="topic" placeholder="Enter topic name" autocomplete="off" class="form-control" id="exampleInputTopic" aria-describedby="TopicHelp" required>

                    </div>

                    <div class="mb-3 text-box">
                        <label for="exampleInputDetails" class="form-label">Discussion</label>
                        <textarea type="text" rows="8" name="details" autocomplete="off" class="form-control" id="exampleInputDetails" aria-describedby="DetailsHelp" required></textarea>

                    </div>
                    <button type="submit" name="postit" class="btn btn-primary pst"><strong>Post</strong></button>
            </div>
            <div class="col-md-3"></div>
            
        </div>
       
    </div>
</body>

</html>