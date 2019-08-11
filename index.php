<?php
require('db_connect.php');
session_start();
if(!isset($_SESSION["email"])){
	header("Location: login.php");
	exit(); 
}
$email = $_SESSION["email"];

$sql1 = "SELECT * FROM users WHERE email='$email'";
$result1 = mysqli_query($con, $sql1);
$username = mysqli_fetch_assoc($result1)['fullname'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome User</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="welcome">
<h1 >Welcome <?php echo $username; ?>! </h1>
<ul class="account_list">
<li><a href="logout.php">Logout</a></li>
<li><a href="reset_password.php">Reset Password</a></li>
</ul>

</div>

</body>
</html>
