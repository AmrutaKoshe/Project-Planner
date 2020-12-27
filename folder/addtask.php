<?php

session_start();

include "connect.php";

$task = $_POST['task'];
$member = $_POST['member'];

$reg = "insert into tasks(task, member) values('$task', '$member')";
mysqli_query($conn, $reg);
// echo "registraion successful";
header('location:members.php');

?>