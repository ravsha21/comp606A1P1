<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php');
if (isset($_POST['fullname'])){
	$first_name = stripslashes($_POST['first_name']);
	$first_name = mysqli_real_escape_string($con,$first_name); 
	$last_name = stripslashes($_POST['last_name']);
	$last_name = mysqli_real_escape_string($con,$last_name);
	$fullname = stripslashes($_POST['fullname']);
	$fullname = mysqli_real_escape_string($con,$fullname); 
	$gender = stripslashes($_POST['gender']);
	$gender = mysqli_real_escape_string($con,$gender); 
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$start_date = date("Y-m-d H:i:s");
        $query = "INSERT into users(first_name,last_name,fullname,gender,email,password, start_date)VALUES('$first_name','$last_name','$fullname','$gender','$email','".md5($password)."', '$start_date')";
        echo $query;
        $result = mysqli_query($con,$query);
        if($result){
        	echo "<div class='form'>
		<h3>You are registered successfully.</h3>
		<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
	<form class="login" action="" method="post">
    		<h1 class="login-title">Register</h1>
		<input type="text" class="login-input" name="first_name" placeholder="First Name" required /><br>
		<input type="text" class="login-input" name="last_name" placeholder="Last Name" required /><br>
		<input type="text" class="login-input" name="fullname" placeholder="Fullname" required /><br>
		<input type="radio" name="gender" value="male" checked> Male
  		<input type="radio" name="gender" value="female"> Female<br>
    		<input type="text" class="login-input" name="email" placeholder="Email Adress"><br>
    		<input type="password" class="login-input" name="password" placeholder="Password"><br>
    		<input type="submit" name="submit" value="Register" class="login-button">
  		<p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
  	</form>
 
<?php } ?>
</body>
</html>