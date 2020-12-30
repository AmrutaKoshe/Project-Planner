<?php
  include('session.php');
  include('project_session.php');
?>

<!-- adding entries -->
  <?php

    if (isset($_POST['add'])) {

      include "connect.php";

      if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      }else{

        $myentry = $_POST['myentry'];
        $pid = $_SESSION['project_id'];
        $uname = $_SESSION['login_user'];

        // fetching member id
        $result = mysqli_query($conn, "SELECT * FROM user_table WHERE uname = '$uname'");
        while ($row = mysqli_fetch_array($result)) {
          $mid = $row['id'];
        }

        $entery_check = mysqli_query($conn, "SELECT * FROM entries WHERE insertentry = '$myentry'");
        $num = mysqli_num_rows($entery_check);
        if($num == 1){
          echo "<script>alert('Entry exists');</script>";
          header("HTTP/1.1 303 See Other");
          header("location: http://$_SERVER[HTTP_HOST]/project-planner/folder/to-do.php");
        }else{
          $insert_entry = mysqli_query($conn, "INSERT INTO entries VALUES('$pid','$mid','$myentry',0)");
          if (!$insert_entry) {
            echo "Try again";
          }else{
            echo "<script>alert('Entry added successfully');</script>";
            header("HTTP/1.1 303 See Other");
            header("location: http://$_SERVER[HTTP_HOST]/project-planner/folder/to-do.php");
          } 
        }
      }
    }

    if (isset($_POST['sub'])) {
        include "connect.php";
        // $todo = $_POST['all'];
        $pid = $_SESSION['project_id'];
        $checkbox1=$_POST['techno'];  
        $chk = "";
        foreach ($checkbox1 as $chk1) {
          $chk = $chk1;
          mysqli_query($conn, "UPDATE entries SET checked='1' where pid = '$pid' and insertentry = '$chk'");
        }
            header("HTTP/1.1 303 See Other");
            header("location: http://$_SERVER[HTTP_HOST]/project-planner/folder/to-do.php");
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
    <link rel="stylesheet" type="text/css" href="../css/entries.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <style type="text/css">
      .entry{
        margin-left: 50px;
        cursor: pointer;
      }
      .check{
        padding-left: 50px;
      }
      .input-group{
        padding: 20px;
        margin: 10px;
        background-color: #f6f6f6;
      }
      input[type=checkbox]:checked + span{
        text-decoration: line-through;
      }
      input[type=text]{
        border: 1px solid gray; 
        height: 60px; 
        width: 100%; 
        padding: 10px; 
        font-size: 20px
      }
      input[type=submit]{
        float: right;
        width: 15%;
        background: #d9d9d9;
        color: #555;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 0;
        height: 60px;
        margin: 5px;
      }
      input[type=submit]:hover {
        background-color: #0d4777;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
        <div class="title"><img src="css/images/pp.png" style="width: 10%; margin-top: 7%;">Project Planner</div>
        <ul class="list-items">
          <li><a href="newProject.php">Home</a></li>
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
                      if ($row["pname"] == $_SESSION['project']) {
                        echo "<li class='tabs_active'><a href=''>".$row["pname"]."</a></li>";
                      }else{
                        echo "<li><a href='searchProject.php'>".$row["pname"]."</a></li>";
                      }
                    }
                  }
                  $conn->close();
                }
                ?>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </nav>
    </div>
    <div class="content">
      <div class="header1"></div>
      <p>
      <div class="wrapper1">
                    <nav>
                      <button class="active"><a href="" class="active">To do list</a></button>
                      <button ><a href="tasks.php">Tasks</a></button>
                      <button ><a href="lists.php">Entries</a></button>
                      <!-- <input type="radio" name="tab" id="home" checked>
                      <input type="radio" name="tab" id="inbox">
                      <input type="radio" name="tab" id="contact">
                      <input type="radio" name="tab" id="Heart">
                      <input type="radio" name="tab" id="About">
                      <button for="home" class="home" style="width: 100%; height: auto;"><label>Entries</label></button> -->

                      <!-- <label for="home" class="home"><a href="home.php">Entries</a></label>
                      <label for="inbox" class="inbox"><a href="dashboardEntries.html"><i class="fas fa-user-friends"></i>Members</a></label>
                      <label for="contact" class="contact"><a href="#"><i class="fas fa-tasks"></i>To-do List</a></label> -->
                      <!-- <label for="heart" class="heart"><a href="#"><i class="far fa-heart"></i>Heart</a></label>
                      <label for="about" class="about"><a href="#"><i class="far fa-user"></i>About</a></label> -->
                      <!-- <div class="tab"></div> -->
                    </nav>

      </div>

     <div class="dash" style="height: 100vh">

     
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="myentry" placeholder="Add entry...">
            <div class="addBtn"><input type="submit" name="add" value="ADD"></div>
      </form>

      <!-- displaying entries -->
        <table style="margin-top: 7%;">
            <tr>
            <!-- <th>Tasks</th> -->
            </tr>
            <?php
            include "connect.php";

            $pid = $_SESSION['project_id'];

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }else{
              $sql = "SELECT * FROM entries where pid = '$pid'";

              $result = mysqli_query($conn, $sql);

              if (!$result) {
                echo "<span>0 results</span>"; 
              } else { 
                // output data of each row
                echo "<table>";
                while($row = $result->fetch_assoc()) {
                  ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method='post'>
                  <?php
                    echo "<div class='input-group'>";
                    echo "<input type='checkbox' value='".$row["insertentry"]."' name='techno[]' class='entry'";
                    if ($row['checked']) echo "checked='checked'";
                    echo">" . "<span class='check'>" . $row["insertentry"]."</span></div>";
                }
                echo "<input type='submit' name='sub' value='update'></form>";
              }
              $conn->close();
            }
            ?>
        </table>
     </div>
</p>
</div>
</body>
</html>