<?php

session_start();

$con = mysqli_connect('localhost','root','root');
$port = '3307';
mysqli_select_db($con, 'project_planner');

$task = $_POST['task'];
$member = $_POST['member'];

$reg = "insert into tasks(task, member) values('$task', '$member')";
mysqli_query($con, $reg);
// echo "registraion successful";
header('location:members.php');

?>