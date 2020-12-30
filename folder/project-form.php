<?php

  include('session.php');
  if (isset($_POST['submit'])) {

    include "connect.php";

    $pname = trim($_POST['pname']);
    $ppass = $_POST['ppass'];
    $login_user = $_SESSION['login_user'];

    // check if project exists
    $pro_check = mysqli_query($conn, "SELECT * from project_table where pname = '$pname'");

    if(mysqli_num_rows($pro_check) == 1){
      $_SESSION['error'] = "Project name already exists";
      header('location:project-form.php');
    }else{
      $result = mysqli_query($conn, "insert into project_table(id,pname, ppass) values(NULL,'$pname', '$ppass')");
      if (!$result) {
        echo "errorrrrrrrrrrrrr";
      }else{
        $_SESSION['project'] = $pname;

        while ($row = mysqli_fetch_array($pro_check)) {
          $project_id = $row['id'];
        }
        $_SESSION['project_id'] = $project_id;

        // adding member to the member_table after opening a project
          $result1 = mysqli_query($conn, "INSERT INTO member_table VALUES ('$project_id', '$login_user')");

          if (!$result1) {
            echo "errorrrrrrrrrrrrr";
          }else{
            header('location:to-do.php');
          }
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Dashboard | Project Planner</title>
    <link rel="icon" type="img/png" href="../css/images/pp.png">
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
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
            <?php
                include "connect.php";

                $uname = $_SESSION['login_user'];

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }else{
                  $result = mysqli_query($conn, "SELECT p.pname FROM project_table p,member_table m where p.id = m.pid and member = '$uname'");

                  if (!$result) {
                      echo "<li><a href='newProject.php'>Select Project</a></li>";
                  } else { 
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li><a href='searchProject.php'>".$row["pname"]."</a></li>";
                    }
                  }
                  $conn->close();
                }
                ?>
        <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </nav>
    </div>
    <div class="projCreate">
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="fieldp">
          <input type="text" name="pname" required>
          <label>Project Name</label>
        </div>
        <div class="fieldp">
          <input type="password" name="ppass" required>
          <label>Project Password</label>
        </div>
        <div>
          <p style="padding: 10px; text-align: center; padding-top: 10%;"><?php
            if(isset($_SESSION['error'])){
              echo($_SESSION['error']);
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
        <div class="fieldp" id="log">
          <input type="submit" name="submit" value="CREATE">
        </div>
<!-- <div class="signup-link">
Not a member? <a href="#">Signup now</a></div> -->
      </form>

</div>
</body>
</html>