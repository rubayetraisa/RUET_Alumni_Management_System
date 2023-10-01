<?php
include "admin_navbar.php";
include "admin_connect.php";
session_start();

if(isset($_POST)&& !empty($_FILES['image']['name'])&& !empty($_POST['title'])){



    $name=$_FILES['image']['name'];
    list($txt,$ext)=explode(".",$name);
    $image_name=time().".".$ext;
    $tmp=$_FILES['image']['tmp_name'];


    if(move_uploaded_file($tmp,'images/'.$image_name)){

        $sql="Insert into gallery(title,image) values ('".$_POST['title']."','".$image_name."')";

        $result=$con->query($sql);

        if($result)
        {
            $_SESSION['success']= "Image uploaded successfully";
            header("Location:admin_gallery.php");

        }
        else{
            $_SESSION['error']="Image uploading failed";
            header("Location:admin_gallery.php");
        }

    }
    else{
        $_SESSION['error']="Please Select Image Or Write Title";
        header("Location:admin_gallery.php"); 
    }

}

?>