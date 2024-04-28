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
<title>Modifier une compétance</title>
<link rel="stylesheet" href="/portfolio/css.css" type="text/css">
<link rel="stylesheet" href="/portfolio/style2.css" type="text/css">
<link rel="icon" href="img/favoicon.png" type="image/x-icon">
</head>
<body>
<?php
require('menu.html');
   $sername = "localhost";
   $username = "root";
   $password = "Jj@msms77176";
   $database = "portfoio";

   $testid = $_GET["id"];
 
   $connection = new mysqli($sername, $username, $password, $database);
 
   if($connection->connect_error){
     die("Connection failed:" . $connection->connect_error);
   }
 
   $sql = "SELECT comp_level, comp_nom FROM comp WHERE id=$testid";
   $result = $connection->query($sql);
 
   if (!$result) {
     die("Invalid query" . $connection->error);
   }
 
 
   while($row = $result->fetch_assoc()) {
    $trdt = $row["comp_nom"];
    $dfd = $row["comp_level"];
    }
?>
<?php


require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'])){
    
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	//requéte SQL + mot de passe crypté
    echo $testid;
    $query = "UPDATE comp SET comp_nom = '$username', comp_level = '$email' WHERE id=$testid";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
             header("location: /portfolio/admin.php");
    }
}else{
    
?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title">Administration</h1>
    <h1 class="box-title">Modifier une compétance</h1>
	<input type="text" class="box-input" style = "color:black" name="username" value= <?php echo $trdt; ?> required />
    <input type="text"  class="box-input" style = "color:black" list=browsers1 name="email" value = <?php echo $dfd; ?> required />
    <datalist id=browsers1 >
    <option> Débutant
    <option> Moyen
    <option> Expert
    </datalist>
    <input type="submit" name="submit" value="Modifier" class="box-button" />
</form>

<?php } ?>

</body>
</html>

