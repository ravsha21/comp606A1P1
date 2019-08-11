<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db_connect.php');  // call database connection file
if (isset($_POST['email'])){   //check if fullname is there
/*stripslashes() function removes backslashes added by the addslashes() 
  mysqli_real_escape_string is used to stop SQL injection attack 
  $_POST use to get data from form 
  mysqli_query() function is used to execute SQL queries. */

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
        //echo $query;  
        //$results = mysqli_query($con, $query); 
	$sql1 = "SELECT * FROM users WHERE email='$email'";
        $result1 = mysqli_query($con, $sql1);
        $email = mysqli_fetch_assoc($result1)['email'];
        
if($email != null){
//echo $email;
echo "<div class='form'>
		<h3>Email already exist.Try again.</h3>
		<br/>Click here to <a href='registration.php'>Register</a></div>";
die();	
}
$result = mysqli_query($con,$query);   //send data to database
        if($result){   //true if no error in data insertion
        	echo "<div class='form'>
		<h3>You are registered successfully.</h3>
		<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
	<form class="registration_form" action="" method="post">
    		<h1 class="login-title">Register</h1>
		<input type="text" class="login-field" name="first_name" placeholder="First Name" required /><br>
		<input type="text" class="login-field" name="last_name" placeholder="Last Name" required /><br>
		<input type="text" class="login-field" name="fullname" placeholder="Fullname" required /><br>
		<input type="radio" name="gender" value="male" checked> Male
  		<input type="radio" name="gender" value="female"> Female<br><br>
    		<input type="email" class="login-field" name="email" placeholder="Email Adress" required ><br>
    		<input type="password" class="login-field" name="password" placeholder="Password" required ><br>
    		<input type="submit" name="submit" value="Register" class="login-button">
  		<p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
  	</form>
 
<?php }  ?>    
</body>
</html>
