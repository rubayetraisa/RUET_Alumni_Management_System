<?php
//include "Navbar.php";
include "Connect.php";
session_start();
if(isset($_POST['reg'])){
  
    $count=0;
    $sql="SELECT roll FROM alumni_side;";
    $res=mysqli_query($con,$sql);
  
    while($row=mysqli_fetch_assoc($res))
    {
      if($row['roll']==$_POST['roll'])
      {$count=$count+1;}
    }
  
    if($count==0){
    mysqli_query($con,"insert into `alumni_side` (Name,Email,Roll,Password,image)
    values('$_POST[name]','$_POST[email]','$_POST[roll]','$_POST[password]','nopic.png');");
    

   // session_start();
    unset($_SESSION['r']);
    $_SESSION['r']=$_POST['roll'];

  ?>
  
  <script type="text/javascript">
    alert("Registration successful");
  </script> 
  <?php
  header('location:Profile.php');
  }
  else
  {
    ?>
    <script type="text/javascript">
    alert("The user already exists");
    </script>
  
  <?php
  
  }
  
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Alumni Management System</title>
</head>
<body>
    <header>
    
    </header>

    <section class="banner">
      <div class="container">
        <div class="row hg">
          <div class="col-md-2"></div>
          <div class="col-md-4 text-center">
            <span class="intro py-3"><img src="images/RUET_logo.svg">
            <h1>Welcome to<br>Alumni Management System</h1>
            </span>
          </div>
          
          <div class="col-md-4 register">
            
              <h3>Registration</h3>
            
            <form method="Post">
              <div class="mb-3 text-box2">
                <label for="exampleInputUser" class="form-label2">Name</label>
                <input type="name" name="name" placeholder="Enter your name" autocomplete="off" class="form-control2" id="exampleInputUser" aria-describedby="UserHelp" required>
                
              </div>

              <div class="mb-3 text-box2">
                <label for="exampleInputEmail1" class="form-label2">Email</label>
                <input type="email" name="email" placeholder="Enter your email" autocomplete="off" class="form-control2" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                
              </div>

              <div class="mb-3 text-box2">
                <label for="exampleInputRoll" class="form-label2">Roll No</label>
                <input type="roll" name="roll" placeholder="Enter your roll no" autocomplete="off" class="form-control2" id="exampleInputRoll" aria-describedby="rollHelp" required>
                
              </div>

              <div class="mb-3 text-box2">
                <label for="exampleInputPassword1" class="form-label2">Password</label>
                <input type="password" name="password" placeholder="Enter your password" autocomplete="off" class="form-control2" id="exampleInputPassword1" required>
              </div>
              <div class="mb-3 form-check2">
                <input type="checkbox" class="form-check-input2" id="exampleCheck" required>
                <label class="form-check-label2" for="exampleCheck">I agree to the rules</label>
              
              </div>
              <button type="submit" class="btn2 btn-primary" name='reg' value='.$r.'>Register</button>
              <div class="log text-center">
                <p>Already have an account?
                <a href="index.php" class="loglink"><b>Login</b></a></p>
            </div>
            </form>
          </div>
          <div class="col-md-2"></div>
          
        </div>

        
      </div>
    </section>

    


  </body>
</html>
