<?php
session_start();
if(!isset($_SESSION["fullname"])){     // check fullname is there
	header("Location: login.php");   // redirect location
	exit(); //end of condition
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome User</title>
<link rel="stylesheet" href="style.css" />   //add style.css file for designing purpose
</head>
<body>
<div class="welcome">
<h1 >Welcome <?php echo $_SESSION['fullname']; ?>!</h1>
<a href="logout.php">Logout</a>
</div>

</body>
</html>
