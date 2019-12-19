<!doctype html>
<?php include "inscriptiondb.php" ; ?>
<html lang="fr">
<head>
<meta charset="UTF-8">
<script src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="style/bootstrap-grid.css" /> 
<link rel="stylesheet" type="text/css" href="style/bootstrap-grid.css.map" />
<link rel="stylesheet" type="text/css" href="style/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mon chat</title>

</head>
<body>
  
<h1>Connectez vous pour acceder au chat :</h1>

<form method="POST" action ="#">

    <input type="text" name="nom" required placeholder="*Pseudo :">
    <input type="email" name="mail" required placeholder="*Email :"><br>
    <input type="password" required id="password" name="password" placeholder="*Mot de passe :">
    <input type="password" required id="confirm_password" name="confirm_Password" placeholder="*Confirmez votre mot de passe :">
    
  
    <input type="submit" value="Submit" >




</form>

<div>
<h1 id="erreur"><?php echo $alerte ?></h1>
</div>

<a class="insc" href="index.php">Retourner au formulaire de connexion</a>


</body>
</html>