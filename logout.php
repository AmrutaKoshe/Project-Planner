<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Project Planner | Logout</title>
	<style type="text/css">
		body{
			background-color: #eff2f8;
		}
		h2{
			margin-top: 100px; text-align: center; color: #5194b3; font-size: 50px
		}
		div{
			margin-top: 100px; text-align: center;
		}
		button{
			height: 50px; width: 100px; background-color: #b6c3f6;font-size: 18px;
		}
		button:hover{
			color: #b6c3f6;
			background-color: #021f92;
		}
	</style>
</head>
<body>
	<h2>Project Planner</h2>
	<div>
		<button onclick="window.location='login.php'">Login</button>
	</div>
</body>
</html>