<!DOCTYPE html>
<header>
    <meta charset="UTF-8">
    <title>Mon portfolio/Compétance</title>
    <link rel="stylesheet" href="/portfolio/css.css" type="text/css">
    <link rel="stylesheet" href="/portfolio/style2.css" type="text/css">
    <link rel="icon" href="img/favoicon.png" type="image/x-icon">
</header>

<body>
<?php require('menu.html'); ?>

      <table class="tableau-style">

      <thead>
        <tr>
            <th class = "theadtr">Compétences</th>
            <th class = "theadtr">Niveaux</th>
        </tr>
      </thead>
      <tbody>
       <?php

        $sername = "localhost";
        $username = "root";
        $password = "Jj@msms77176";
        $database = "portfoio";

        $connection = new mysqli($sername, $username, $password, $database);

        if($connection->connect_error){
          die("Connection failed:" . $connection->connect_error);
        }

        $sql = "SELECT * FROM comp";
        $result = $connection->query($sql);

        if (!$result) {
          die("Invalid query" . $connection->error);
        }


        while($row = $result->fetch_assoc()) {
         if($row["comp_level"]=="Débutant"){
          echo "<tr>
          <td>" . $row["comp_nom"] . "</td>
          <td style='color:red'>". $row["comp_level"] . "</td>
         </tr>";
         }elseif($row["comp_level"]=="Moyen"){
            echo "<tr>
            <td>" . $row["comp_nom"] . "</td>
            <td style='color:#f79646'>" . $row["comp_level"] . "</td>
         </tr>";
          }else{
          echo "<tr>
          <td>" . $row["comp_nom"] . "</td>
          <td style='color:green'>" . $row["comp_level"] . "</td>
          </tr>";
          };
          
        };
       
        ?>
      </tbody>
    </table>
</body>

