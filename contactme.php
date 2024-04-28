<!DOCTYPE html>
<header>
    <title>Mon portfolio/me contacter</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css.css">
    <link rel="icon" href="img/favoicon.png" type="image/x-icon">
</header>

<body>
<?php require('menu.html'); ?>
      <h3 class="titrecontact">Comment me contacter ?</h3>
      <br>

      <div class="divimg1">
      <img class="imgmail" src="/portfolio/img/adresse-mail.ico" >
      <h4>Par mail :<a href=mailto:y.villegier@campussaintaspais.fr> Envoyez-moi un courriel</a></h4>
      </div>
      <div class="divimg2">
      <img class="imgmail" src="/portfolio/img/Logo-telephone-contacts-cnam-hdf.png" >
      <h4>Par téléphone : <a href="tel:0668470383"> Appelez moi</a></h4>
      </div>

      <h4 class="titrecontact">OU</h4>
      <br>

        

      <?php

      require('config.php');
if (isset($_REQUEST['sujet'], $_REQUEST['email'],  $_REQUEST['message'])){
	$sujet = ($_REQUEST['sujet']);
	$email =  ($_REQUEST['email']);
  $message = stripslashes($_REQUEST['message']);
	//requéte SQL 
    $query = "INSERT INTO `msg` (email, sujet, message) ".
              "VALUES ('$email', '$sujet', '$message')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
      $message = "Le messsage a bien êtê transmis.";
    }
}else{

}
  
      ?>

      <form class="formcontact" method="POST" action="" enctype="multipart/form-data">
        <h4  class="labelusecontact">En remplissant ce formulaire</h4>
        <label class="labelusecontact">Le sujet</label>
        <input class="labusercontcat" type="text" name="sujet"  required>
        <label  class="labelusecontact">Votre mail</label>
        <input class="labusercontcat" type="email" name="email"  required>
        <label class="labelusecontact">Votre message</label>
        <textarea class="text1use" name="message" required> </textarea>
        <br>
        <input class="btn" type="submit" name="submit" value="Envoyer">
        <?php if (! empty($message)) { ?>
        <br>
        <p class="sandmail"><?php echo $message; ?></p>
        <?php } ?>
      </form>
      
</body>

