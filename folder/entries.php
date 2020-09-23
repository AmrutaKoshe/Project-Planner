<?php
  include('session.php');
  include('project_session.php');
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
    <style type="text/css">
      button{
        width: 34.2%;
        height: 3.1rem; 
        border: none; 
        font-size: 22px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }
    .active{
        background: #5baed4;
        color: #ffffff;
      }
      a{
        text-decoration: none; 
        color: #000000;
      }
      button:hover{
        transition: 0.4s;
        background: #5baed4;
      }
      a:hover{
        color: #ffffff;
      }

      table {
        border-collapse: collapse;
        width: 100%;
        color: #3c6992;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
        }
        th {
        background-color: #3c6992;
        color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}


        .addBtn input{
          padding: 5px;
          width: 15%;
          background: #d9d9d9;
          color: #555;
          float: left;
          text-align: center;
          font-size: 16px;
          cursor: pointer;
          transition: 0.3s;
          border-radius: 0;
        }

        .addBtn input:hover {
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
        <li><a href="newProject.php"><?php echo($_SESSION['project']) ?></a></li>
<li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </nav>
    </div>
    <div class="content">
      <div class="header1"></div>
      <p>
      <div class="wrapper1">
                    <nav>
                      <button class="active"><a href="" class="active">Entries</a></button>
                      <button ><a href="members.php">Tasks</a></button>
                      <button ><a href="lists.php">To do List</a></button>
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

     <div class="dash">

     
     <form action="addentry.php" method="post">
            <input style="border: 1px solid gray; height: 60px; width: 100%" type="text" name="myentry" placeholder="Add entry...">
            <div class="addBtn"><input type="submit" value="ADD"></div>
        </form>

        <!-- <form action="addentry.php" method="post">
            <input style="" class="assigntask" type="text" placeholder="Enter Task" name="task" required><br>
            <div class="task" id="log"><input type="submit" value="ASSIGN TASK"></div>
        </form> -->


        <table style="margin-top: 7%;">
            <tr>
            <!-- <th>Task</th> -->
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root","root");
            // Check connection
            mysqli_select_db($conn, 'project_planner');

            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT insertentry FROM addentry";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["insertentry"].  "</td></tr>";
            }
            echo "</table>";
            } else { echo "0 results"; }
            $conn->close();
            ?>
        </table>

     </div>
</p>
</div>
</body>
</html>