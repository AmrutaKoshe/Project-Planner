<?php
  include('session.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Dashboard | Project Planner</title>
    <link rel="icon" type="img/png" href="css/images/pp.png">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <!-- top right logout button -->
    <!-- <section>
      <div class="logout"><a href="logout.php" class="logout">Logout</a></div>
    </section> -->
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
    <div class="content1">
        <button class="create" type="button" onClick="parent.location='project-form.php'">Create New Project</button>
        <br>
        <p>OR</p>
        <br>
        <button class="create" type="button" onClick="parent.location='searchProject.php'">Search for existing Project</button>
        <!-- <div class="header">
  Animated Side Navigation Menu</div>
  <p>
  using only HTML and CSS</p> -->
  </div>
</div>
</body>
</html>