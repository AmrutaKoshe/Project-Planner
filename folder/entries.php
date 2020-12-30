<?php
  include('session.php');
  include('project_session.php');
?>

<?php

    if (isset($_POST['submit'])) {

      include "connect.php";

      if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      }else{

        $content = $_POST['content'];
        $pid = $_SESSION['project_id'];
        $uname = $_SESSION['login_user'];

        // fetching member id
        // $result = mysqli_query($conn, "SELECT * FROM entry where pid = '$pid'");
        // while ($row = mysqli_fetch_array($result)) {
        //   $mid = $row['id'];
        // }

        $entery_check = mysqli_query($conn, "SELECT * FROM entry WHERE pid = '$pid'");
        $num = mysqli_num_rows($entery_check);
        if($num == 1){
          $insert_entry = mysqli_query($conn, "UPDATE entry SET content = '$content'");
          if (!$insert_entry) {
            echo "Try again";
          }else{
            echo "<script>alert('Entry added successfully');</script>";
            header("HTTP/1.1 303 See Other");
            header("location: http://$_SERVER[HTTP_HOST]/Project-Planner/folder/entries.php");
          } 

        }else{
          $insert_entry = mysqli_query($conn, "INSERT INTO entry VALUES('$pid','$content')");
          if (!$insert_entry) {
            echo "Try again";
          }else{
            echo "<script>alert('Entry added successfully');</script>";
            header("HTTP/1.1 303 See Other");
            header("location: http://$_SERVER[HTTP_HOST]/Project-Planner/folder/entries.php");
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/entries.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/list.css"> -->
    
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

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
    <div class="content">
      <div class="header1"></div>
      <p>
      <div class="wrapper1">
                    <nav>
                      <button><a href="to-do.php">To do List</a></button>
                      <button ><a href="tasks.php">Tasks</a></button>
                      <button class="active" ><a href="" class="active">Entries</a></button>
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

     <div class="dash" >

      <!-- insert hereeee -->
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
          <div>
              <textarea cols="250" rows="50" id="content" name="content"> 
                  <?php 
                    include "connect.php";

                    if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                    }else{
              
                      $pid = $_SESSION['project_id'];
                      $uname = $_SESSION['login_user'];
                  
                  $result = mysqli_query($conn, "SELECT * FROM entry where pid = '$pid'");
                  $row = mysqli_fetch_array($result);
                  echo $row['content'];
                    }
                  
                  ?>
              </textarea>
              <script type="text/javascript">
                CKEDITOR.replace( 'content' );
              </script>
              <input type="submit" value="Submit" name="submit"/>
              
              
          </div>
      </form>
        
     <table style="margin-top: 7%;">
            <tr>
            </tr>
            <?php
            // $conn = mysqli_connect("localhost"," ","root");

            include "connect.php";

            $pid = $_SESSION['project_id'];

            // Check connection
            // mysqli_select_db($conn, 'project_planner');

            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            // insert here
  
            $conn->close();
            ?>
        </table>

     </div>
</p>
</div>
</body>
</html>