<?php

session_start();

include "connect.php";

$mylist = $_POST['mylist'];

$reg = "insert into todolist(list) values('$mylist')";
mysqli_query($conn, $reg);
// echo "registraion successful";
header('location:lists.php');

?>