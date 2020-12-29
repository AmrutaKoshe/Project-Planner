 <?php

      if (isset($_POST['sub'])) {
        include "connect.php";
        // $todo = $_POST['all'];
        $checkbox1=$_POST['techno'];  
        $chk = "";
        foreach ($todo as $chk1) {
          $chk = $chk1;
        }
        echo $chk;
      }

    ?>
