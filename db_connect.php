<?php
$con = mysqli_connect("localhost","root","","assignment1"); // create connection with database
if (mysqli_connect_errno())      // check if there is any error
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
/*else{echo "connected";}*/
?>
