<?php
include "admin_connect.php";
//include "Navbar.php";

session_start();

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
          <div class="col-md-4 login">
            
              <h3>Login</h3>
            
            <form method="Post">
              <div class="mb-3 text-box">
                <label for="exampleInputRoll1" class="form-label">User ID</label>
                <input type="roll" name="roll" placeholder="Enter your roll"  class="form-control" id="exampleInputRoll1" aria-describedby="rollHelp" required>
                
              </div>
              <div class="mb-3 text-box">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" placeholder="Enter your password" class="form-control" id="exampleInputPassword1" required>
              </div>
              <div class="mb-3 form-check">
                <!--<input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>-->
                <a class="forget" href="http://localhost:3000/student/index.php">Login as alumni</a> 
              </div>
              <button type="submit" class="btn btn-primary" name="submit" value="login">Login</button>
             
            </form>
          </div>
          <div class="col-md-2"></div>

          

        </div>
         
        <?php
if(isset($_POST['submit'])){

  

  if($_POST['roll']!='1111111'&&$_POST['password']!='admin')
  {
    ?>

    <div class="alert alert-warning" style="width:670px; margin-left:280px ;">
      <strong>The username and password doesn't match</strong>
    </div>
    <?php
  }
  else
  {
    
    ?>
    <script type="text/javascript">
       window.location="admin_home.php";
      // header('location:Home.php');
    </script>
    <?php
  }


}

?>
        
      </div>
    </section>

    


  </body>
</html>
