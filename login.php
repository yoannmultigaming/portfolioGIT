<!DOCTYPE html>
<html>
<head>
	<title>Connection Administration</title>
	<link rel="stylesheet" href="style2.css"/>
	<link rel="icon" href="img/favoicon.png" type="image/x-icon">
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: admin.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title">Administration</h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required>
<input type="password" class="box-input" name="password" placeholder="Mot de passe" required>
<input type="submit" value="Connexion " name="submit" class="box-button">
<h3><a href="https://yoann.yoann-nas.fr/portfolio/">Retour sur le site</a></h3>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>