<?php

	session_start();

    $conn = mysqli_connect('localhost','root','root');
	$port = '3307';

    
    mysqli_select_db($conn,'project_planner');
    
    
	
	$pname = $_POST['pname'];
    $ppass = $_POST['ppass'];

    
    $s = "select * from project_table where pname = '$pname'";

    $result = mysqli_query($conn, $s);

    $num = mysqli_num_rows($result);

	if($num == 1){
	}else{
        $result = "insert into project_table(id,pname, ppass) values(NULL,'$pname', '$ppass')";
        mysqli_query($conn, $result);
		// $_SESSION['message']="Success";
		header('location:entries.php');
	}

?>