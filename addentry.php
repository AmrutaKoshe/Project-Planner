<?php

session_start();

$con = mysqli_connect('localhost','root','root');
$port = '3307';
mysqli_select_db($con, 'project_planner');

$myentry = $_POST['myentry'];

$reg = "insert into addentry(insertentry) values('$myentry')";
mysqli_query($con, $reg);
// echo "registraion successful";
header('location:entries.php');

?>