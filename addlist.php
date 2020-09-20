<?php

session_start();

$con = mysqli_connect('localhost','root','root');
$port = '3307';
mysqli_select_db($con, 'project_planner');

$mylist = $_POST['mylist'];

$reg = "insert into todolist(list) values('$mylist')";
mysqli_query($con, $reg);
// echo "registraion successful";
header('location:lists.php');

?>