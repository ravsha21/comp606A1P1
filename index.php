<?php
session_start();
if(!isset($_SESSION["fullname"])){
	header("Location: login.php");
	exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome User</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="welcome">
<h1 >Welcome <?php echo $_SESSION['fullname']; ?>!</h1>
<a href="logout.php">Logout</a>
</div>

</body>
</html>