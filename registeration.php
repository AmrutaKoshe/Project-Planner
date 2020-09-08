<?php

session_start();

$conn = mysqli_connect('localhost','root','root');
$port = '3306';
mysqli_select_db($conn, 'Project_Planner');

$Name = $_POST['full_name'];
$UserName = trim($_POST['username']);
$Password = $_POST['password'];

$query = "select * from user_table where uname = '$UserName'";

$result = mysqli_query($conn, $query);

$num = mysqli_num_rows($result);

if($num >= 1){
	header('location:Register.php');
	alert("Username already exists");
}else{
	$reg = "insert into user_table(name, uname, upass) values('$Name' , '$UserName' , '$Password')";
	mysqli_query($conn, $reg);
	header('location:home.php');
	alert("registraion successful");
}

?>