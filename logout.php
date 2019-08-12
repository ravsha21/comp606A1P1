<?php
session_start();
if(session_destroy()){     //close the session to clear the values from session
header("Location: login.php");   //redirect on login page
}
?>
