<?php

session_start();

$con = mysqli_connect('localhost','root','root');
$port = '3307';
mysqli_select_db($con, 'project_planner');

$name = $_POST['full_name'];
$user = $_POST['username'];
$pass = $_POST['password'];

$s = "select * from user_table where uname = '$user'";

$result = mysqli_query($con, $s);
 
$num = mysqli_num_rows($result);

if($num == 1){
	echo "username already taken";
}else{
	$reg = "insert into user_table(name, uname, upass) values('$name', '$user' , '$pass')";
	mysqli_query($con, $reg);
	$_SESSION['login_user'] = $user;
	// echo "registraion successful";
	header('location:newProject.php');
}

?>