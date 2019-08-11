<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
session_start();
require('db_connect.php');
if (isset($_POST['fullname'])){
	$fullname = stripslashes($_POST['fullname']);
	$fullname = mysqli_real_escape_string($con,$fullname);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM users WHERE fullname='$fullname'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['fullname'] = $fullname;
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
	<form class="login_here" action="" method="post" name="login">
    <h1 class="login-here">Login</h1>
    <input type="text" class="login-field" name="fullname" placeholder="Fullname" autofocus><br>
    <input type="password" class="login-field" name="password" placeholder="Password"><br>
    <input type="submit" value="Login" name="submit" class="loginButton">
  <p class="registration-here"><a href="registration.php">Register</a></p>
  </form>
 
<?php } ?>
</body>
</html>
