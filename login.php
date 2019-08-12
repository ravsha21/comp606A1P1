<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
session_start();     
require('db_connect.php');      //include database file
if (isset($_POST['email'])){   
	$email = stripslashes($_POST['email']);   //function to removes backslashes
	$email = mysqli_real_escape_string($con,$email);   //to avoid sql injection
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM users WHERE email='$email' and password='".md5($password)."'"; //get data from user table
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['email'] = $email;  //store value in session
	    header("Location: index.php");
         }else{           //if record not  match
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
	<form class="login_form" action="" method="post" name="login">
    <h1 class="login-here">Login</h1>
    <input type="text" class="login-field" name="email" placeholder="Email address" autofocus required><br>
    <input type="password" class="login-field" name="password" placeholder="Password" required><br>
<input type="submit" value="Login" name="submit" class="loginButton">
<p class="registration-here"><a href="registration.php">Register</a></p>
  </form>
 
<?php } ?>
</body>
</html>
