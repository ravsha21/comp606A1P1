<?php
session_start();
if(!isset($_SESSION["email"])){
	header("Location: login.php");
	exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db_connect.php');  // call database connection file
if (isset($_POST['password'])){   //check if fullname is there
/*stripslashes() function removes backslashes added by the addslashes() 
  mysqli_real_escape_string is used to stop SQL injection attack 
  $_POST use to get data from form 
  mysqli_query() function is used to execute SQL queries. */
	$email = $_SESSION["email"];
	$email = mysqli_real_escape_string($con,$email);
	$new_pass = md5($_POST['password']);
	$new_pass = mysqli_real_escape_string($con,$new_pass);
        $query = "UPDATE users SET password='$new_pass' WHERE email='$email'";
        //echo $query;  
        
$result = mysqli_query($con,$query);   //send data to database
        if($result){   //true if no error in data insertion
        	echo "<div class='form'>
		<h3>Your password is changed successfully.</h3>
		<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
	<form class="registration_form" action="" method="post">
    		<h1 class="login-title">Reset Password</h1>
<input type="password" class="login-field" name="password" placeholder="Enter New Password" required ><br>
    		<input type="submit" name="submit" value="Submit" class="login-button">
  		
  	</form>
 
<?php }  ?>    
</body>
</html>
