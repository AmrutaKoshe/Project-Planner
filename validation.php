<?php

session_start();

$conn = mysqli_connect('localhost','root','root');
// (server_name,username,password)
mysqli_select_db($conn, 'Project_Planner');
// connection to the database Project_Planner 

$UserName = trim($_POST['username']);
$Password = $_POST['password'];

$query = "select * from user_table where uname = '$UserName' && upass = '$Password'";
//  uname and upass are column names of table user_table from database Project_Planner

$result = mysqli_query($conn, $query);

$num = mysqli_num_rows($result);

if($num >= 1){
	$_SESSION['username'] = $name;
	header('location:home.php');
}else{
	alert("Try again");
	header('location:login.php');
}

?>