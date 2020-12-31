<?php

if (isset($_POST['submit'])) {
  session_start();

  include "connect.php";

  if($conn->connect_error) {
    die("connection error".$conn->connect_error);
  }else{
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "select * from user_table where uname = '$user' && upass = '$pass'";
    //  uname and upass are column names of table user_table from database Project_Planner

    $result = mysqli_query($conn, $query);

    $num = mysqli_num_rows($result);

    if($num == 1){
        $_SESSION['login_user'] = $user;
        header('location: newProject.php');
    }else{
      $_SESSION['login_error'] = 'Try again';
      // header('location:login.php');
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Planner | Login</title>
    <link rel="icon" type="img/png" href="../assets/css/images/pp.png">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="wrapper">
      <div class="title">Login Form</div>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="field">
          <input type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="field">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div>
          <p style="padding: 10px; text-align: center; padding-top: 1%;"><?php
            if(isset($_SESSION['login_error'])){
              echo($_SESSION['login_error']);
            }
          ?></p>
        </div>
<!-- <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div> -->
        <div class="field" id="log"><input name="submit" type="submit" value="LOGIN"></div>
        <div class="signup-link">Not a member? <a href="../index.php">Signup now</a></div>
    </form>
    </div>
</body>
</html>