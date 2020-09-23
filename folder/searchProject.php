<?php
  include('session.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Dashboard | Project Planner</title>
    <link rel="icon" type="img/png" href="../css/images/pp.png">
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
        <div class="title">Project Planner</div>
          <ul class="list-items">
          <li><a href="newProject.php">HOME</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
          </ul>
      </nav>
    </div>

    <div class="projCreate">
      <form action="projval.php" method="post">
        <div class="fieldp">
          <input type="text" name="pname" required>
          <label>Project Name</label>
        </div>
        <div class="fieldp">
          <input type="password" name="ppass" required>
          <label>Project Password</label>
        </div>
<!-- <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div> -->
        <div class="fieldp" id="log">
          <input type="submit" value="Search">
        </div>
<!-- <div class="signup-link">
Not a member? <a href="#">Signup now</a></div> -->
      </form>

</div>
    <!-- <div class= "searchPos">
      <form class="example" action="action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button class="search" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <div class="listDisplay">
      <h2 class="afterSearchClick">PROJECT PLANNER found!</h2>
      <div class="proPass">
        <input type="password" required placeholder="Project Password">
      </div>
    <div class="proPass" id="log">
     <input type="submit" value="ENTER">
    </div>
  </div> -->
</body>
</html>