<?php
/*Initialize the session*/
session_start();

/*Unset all of the session*/
$_SESSION = array();

/*Destroy the session*/
session_destroy();

/*Redirect to login page*/
header("location: http://localhost/web_project/first.php");
exit;
?>
