<?php

session_start();
if(!isset($_SESSION['username'])){
	header('loction:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>

WRONG NAME OR PASSWORD
<br>
	<a href="logout.php">Please try again</a>


</body>
</html>