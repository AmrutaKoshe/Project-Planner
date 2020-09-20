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

    <style>
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

      .task input{
        margin-top: 3%;
        margin-left: 27%;
        height: 40px;;
        width: 40%;
        outline: none;
        font-size: 17px;
        background-color: #5baed4;
        border: 1px solid lightgrey;
        border-radius: 5px;
        transition: all 0.3s ease;
      }

      .task input:hover{
        background-color: #0d4777;
        color: white;  
        cursor: pointer;
      }

      .assigntask{
        margin-left: 28%;
        margin-top: 1%;
        width: 40%;
        padding: 5px 7px;
        border-radius: 8px;
        height: 45px;
        border: 1px solid rgb(179, 179, 179);
      }

      .assigntask:hover{
        border-bottom: 2px solid #3f3a3b;
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
        <div class="title">Side Menu</div>
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
                      <button><a href="entries.php">Entries</a></button>
                      <button class="active"><a href="" class="active">Tasks</a></button>
                      <button ><a href="lists.php">To-do List</a></button>
                    </nav>
     </div>

     <div class="dash">

        <table>
            <tr>
            <th>Task</th>
            <th>Member</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root","root");
            // Check connection
            mysqli_select_db($conn, 'project_planner');

            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT task, member FROM tasks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["task"]. "</td><td>" . $row["member"] . "</td></tr>";
            }
            echo "</table>";
            } else { echo "0 results"; }
            $conn->close();
            ?>
        </table>

        <form action="addtask.php" method="post">
            <input style="margin-top: 16%;" class="assigntask" type="text" placeholder="Enter Task" name="task" required><br>
            <input class="assigntask" type="text" placeholder="Enter Member" name="member" required><br>
            <div class="task" id="log"><input type="submit" value="ASSIGN TASK"></div>
        </form>

     </div>
</p>
</div>
</body>
</html>