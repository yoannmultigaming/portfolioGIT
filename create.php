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
<title>Ajouter une compétance</title>
<link rel="stylesheet" href="/portfolio/css.css" type="text/css">
<link rel="stylesheet" href="/portfolio/style2.css" type="text/css">
<link rel="icon" href="img/favoicon.png" type="image/x-icon">
</head>
<body>

<?php


require('menu.html');
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	//requéte SQL + mot de passe crypté
    $query = "INSERT INTO `comp` (comp_nom, comp_level) ".
              "VALUES ('$username', '$email')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
             header("location: /portfolio/admin.php");
    }
}else{
    
?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title">Administration</h1>
    <h1 class="box-title">Ajoutter une compétance</h1>
	<input type="text" class="box-input" style = "color:black" name="username" placeholder="Compétance" required />
    <input type="text"  class="box-input" style = "color:black" list=browsers1 name="email" placeholder="Compétance" required />
    <datalist id=browsers1 >
    <option> Débutant
    <option> Moyen
    <option> Expert
    </datalist>
    <input type="submit" name="submit" value="Ajoutter" class="box-button" />
</form>
<?php } ?>
</body>
</html>