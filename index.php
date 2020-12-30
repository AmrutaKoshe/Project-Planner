<?php

if(isset($_POST['submit'])){
  session_start();

  $conn = mysqli_connect('localhost','root','','project_planner');
  $port = '3307';

  $name = $_POST['full_name'];
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $s = "select * from user_table where uname = '$user'";

  $result = mysqli_query($conn, $s);
   
  $num = mysqli_num_rows($result);

  if($num == 1){
    echo "<script> alert('username already taken'); </alert>";
  }else{
    $reg = "insert into user_table(name, uname, upass) values('$name', '$user' , '$pass')";
    mysqli_query($conn, $reg);
    $_SESSION['login_user'] = $user;
    // echo "registraion successful";
    header('location:folder/newProject.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Planner</title>
    <script type="text/javascript" src="folder/validations.js"></script>
    <link rel="icon" type="img/png" href="css/images/pp.png">
    <link rel="stylesheet" href="css/Register.css">

    <style>

    body{
            background-image: url('css/images/pp_logo.jpeg');
            background-size: cover;
          }
    </style>
  </head>
  <body>
    <div class="wrapper" style="margin-top: 3%;">
      <div class="title">Register Form</div>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="register" onsubmit="return validateform()">
        <div class="field">
          <input type="text" name="full_name" required>
          <label>Name</label>
        </div>
        <div class="field">
          <input type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="field">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
<!-- <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div> -->
        <div class="field" id="log"><input name="submit" type="submit" value="Register"></div>
        <div class="signup-link">Already a member? <a href="folder/login.php">Login now</a></div>
</form>
</div>
</body>
</html>