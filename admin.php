<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<title>portfolio/admin</title>
	<link rel="stylesheet" href="/portfolio/css.css" type="text/css">
    <link rel="stylesheet" href="/portfolio/style2.css" type="text/css">
	<link rel="icon" href="img/favoicon.png" type="image/x-icon">
	</head>
	<body>
	<?php require('menu.html'); ?>
	  <br>
	  <div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
		<br>
		<form action="logout.php" method="get" >
  <button class= 'btn' type="submit">Déconnexion</button>
		</div>

		<h2 class="sucess">tableau de compétance</h2>



	  <table class="tableau-style">
<thead>
  <tr>
	  <th class = "theadtr">ID</th>
	  <th class = "theadtr"> Compétance</th>
	  <th class = "theadtr">Niveaux</th>
	  <th class = "theadtr">Action</th>
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

  $leveltest = 0;

  while($row = $result->fetch_assoc()) {
   if($row["comp_level"]=="Débutant"){
	echo "<tr>
	<td>" . $row["id"] . "</td>
	<td>" . $row["comp_nom"] . "</td>
	<td style='color:red'>". $row["comp_level"] . "</td>
	<td>
	<a href='/portfolio/edit.php?id=$row[id]'>Edit</a>
	<a href='/portfolio/delete.php?id=$row[id]'>Delete</a>
	</td>
   </tr>";
   }elseif($row["comp_level"]=="Moyen"){
	  echo "<tr>
	  <td>" . $row["id"] . "</td>
	  <td>" . $row["comp_nom"] . "</td>
	  <td style='color:#f79646'>" . $row["comp_level"] . "</td>
	  <td>
	  <a href='/portfolio/edit.php?id=$row[id]'>Edit</a>
	  <a href='/portfolio/delete.php?id=$row[id]'>Delete</a>
 	 </td>
   </tr>";
	}else{
	echo "<tr>
	<td>" . $row["id"] . "</td>
	<td>" . $row["comp_nom"] . "</td>
	<td style='color:green'>" . $row["comp_level"] . "</td>
	<td>
	<a href='/portfolio/edit.php?id=$row[id]'>Edit</a>
	<a href='/portfolio/delete.php?id=$row[id]'>Delete</a>
	</td>
	</tr>";
	};
	
  };
 
  ?>
</tbody>
</table>
<div class="sucess">
<a class="btn"  href="/portfolio/create.php">Créer une nouvelle compétance</a>

</div>
<h2 class="sucess">vos message</h2>
<table class="tableau-style">
<thead>
  <tr>
	  <th class = "theadtr">ID</th>
	  <th class = "theadtr">Email</th>
	  <th class = "theadtr">Sujet</th>
	  <th class = "theadtr">Message</th>
	  <th class = "theadtr">Action</th>
  </tr>
</thead>
<tbody>


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

  $sql = "SELECT * FROM msg";
  $result = $connection->query($sql);

  if (!$result) {
	die("Invalid query" . $connection->error);
  }

  $leveltest = 0;

  while($row = $result->fetch_assoc()) {
	echo "<tr>
	<td>" . $row["id"] . "</td>
	<td>" . $row["email"] . "</td>
	<td>". $row["sujet"] . "</td>
	<td>". $row["message"] . "</td>
	<td>
	<a href='/portfolio/deletemsg.php?id=$row[id]'>Delete</a>
	<a href='mailto:$row[email]'>repondre</a>
	</td>
   </tr>";
  };
 
  ?>
</tbody>
</table>
</body>
</form>
</html>