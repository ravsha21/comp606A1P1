<?php
$con = mysqli_connect("localhost","root","","assignment1");   //query to create connection
if (mysqli_connect_errno())                        //check if there is an error
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
/*else{ echo "connected"; }*/
?>
