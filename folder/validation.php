<?php

session_start();

$conn = mysqli_connect('localhost','root','root');
// (server_name,username,password)
mysqli_select_db($conn, 'project_planner');
// connection to the database Project_Planner 

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$user = trim($_POST['username']);
	$pass = $_POST['password'];

	$query = "select * from user_table where uname = '$user' && upass = '$pass'";
	//  uname and upass are column names of table user_table from database Project_Planner

	$result = mysqli_query($conn, $query);

	$num = mysqli_num_rows($result);

	if($num >= 1){
	    $_SESSION['login_user'] = $user;
	    header('location: newProject.php');
	}else{
	// alert("Try again");
		header('location:login.php');
	}
}

?>