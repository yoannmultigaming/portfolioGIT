<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}

   $sername = "localhost";
   $username = "root";
   $password = "Jj@msms77176";
   $database = "portfoio";

   $testid = $_GET["id"];
    echo $testid;
 
   $connection = new mysqli($sername, $username, $password, $database);
 



require('config.php');
    echo $testid;
    $query = "DELETE FROM msg WHERE id=$testid";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
             header("location: /portfolio/admin.php");
    }

    
    ?>
    <form class="box" action="" method="post">
        <h1 class="box-logo box-title">Administration</h1>
        <h1 class="box-title">Voulez-vous vraimmer supprimer</h1>
        <datalist id=browsers1 >
        <option> Débutant
        <option> Moyent
        <option> Expert
        </datalist>
        <input type="submit" name="submit" value="oui" class="box-button" />
    </form>
    
    <?php ?>
    
    </body>
    </html>
    

