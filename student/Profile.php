<?php
include 'Navbar.php';
include 'Connect.php';

session_start();
$roll = $_SESSION['r'];
$k=0;

$sql = "Select * from `alumni_side` where roll=$roll;";
$sql2 = "Select Roll,Name,image from `alumni_side` where roll=$roll;";
$user = mysqli_fetch_assoc(mysqli_query($con, $sql2));
$result = mysqli_query($con, $sql);
if ($result) {

	$row = mysqli_fetch_assoc($result);

	$name = $row['Name'];
	$email = $row['Email'];
	$phone = $row['phone'];
	$company = $row['company'];
	$country = $row['country'];
	$designation = $row['designation'];
	$bio = $row['bio'];
}


if (isset($_POST['update'])) {

    $k=$k+1;
	mysqli_query($con, "update `alumni_side` set Name='$_POST[name]',Email='$_POST[email]',phone='$_POST[phone]',company='$_POST[company]',country='$_POST[country]',designation='$_POST[designation]',bio='$_POST[bio]' where roll=$roll;");
?>

	<script type="text/javascript">
		alert("Updated successfully");
		window.location="Profile.php";
	</script>
<?php

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Alumni Management System</title>
</head>

<body>
	<section class="container">
		<div class="row r1">

			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card" style="width: 45rem;">
					<form class="form" id="form" action=" " enctype="multipart/form-data" method="post">
						<div class="image">
							<?php
							
                            

							$r = $user['Roll'];
							
                            $name1=$user['Name'];
							$image = $user['image'];
							?>
							<!-- <img src="images/tonu.jpg" class="card-img-top" alt="No Image"> -->
                            
							<img src="images/<?php echo $image; ?>" class="card-img-top" alt="No Image" width=125 height=125 title="<?php echo $image; ?>">

						</div>
						<div class="image files">
							<input type="hidden" name="roll" value="<?php echo $r; ?>">
							<input type="hidden" name="name1" value="<?php echo $name1; ?>">
							<input type="file" name="image" id="image" accept=".jpg, .png, .jpeg">
                            <button class="btn btn-primary btn">Edit Profile Picture</button>
						</div>
					</form>
                          <script type="text/javascript">
                                document.getElementById("image").onchange=function(){
									document.getElementById('form').submit();
								}
	                      </script>

					<?php

					if (isset($_FILES["image"]["name"])) {
						$r=$roll;
						// $name1=$_POST['Name'];

						$imageName = $_FILES["image"]["name"];
						$imageSize = $_FILES["image"]["size"];
						$tmpName = $_FILES["image"]["tmp_name"];

						$validExtension = ['jpg', 'png', 'jpeg'];
						$imageExtension = explode('.', $imageName);
						$imageExtension = strtolower(end($imageExtension));

						if (!in_array($imageExtension, $validExtension)) {
							if($k!=0)
							{
							echo
							" 
								<script>
								alert('Invalid Image Extension');
								
								</script>
								";}
						} elseif ($imageSize > 1200000) {
							echo
							" 
								<script>
								alert('Image size is too large');
								
								</script>
						    ";
						} else {
							$newImageName = $name1 . "." . $imageExtension;
							mysqli_query($con, "update `alumni_side` set image='$newImageName' where roll=$r;");
							move_uploaded_file($tmpName, 'images/' . $newImageName);
							?>
							<script type="text/javascript">
							   window.location="Profile.php";
							  // header('location:Home.php');
							</script>
							<?php
						}
					}
					?>


					<div class="card-body cd">
						<h3 class="card-title text-center"><br>Profile</h3>
						<form method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" value="<?php echo $email; ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone number</label>
										<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Company/Institute</label>
										<input type="text" name="company" class="form-control" value="<?php echo $company; ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Country</label>
										<input type="text" name="country" class="form-control" value="<?php echo $country; ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Designation</label>
										<input type="text" name="designation" class="form-control" value="<?php echo $designation; ?>" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Bio</label>
										<textarea class="form-control" name="bio" rows="4" required><?php echo $bio; ?></textarea>
									</div>
								</div>
							</div>

							<button type="submit" class="btn btn-primary upbtn" name="update">Update</button>
					</div>
					</form>
				</div>


			</div>
			<div class="col-md-3"></div>

		</div>
		<?php



		?>
	</section>
</body>

</html>