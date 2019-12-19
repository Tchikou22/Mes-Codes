<!doctype html>
<?php include "connexiondb.php" ; ?>
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

    <input type="text" required name="pseudo" placeholder="*Pseudo :">
    <input type="password" required name="password" placeholder="*Mot de passe :">

    <input type="submit" value="Submit" >

</form>

<a class="insc" href="inscription.php">Acceder au formulaire d'inscription</a>

<div id="erreur">
<?php echo $alerte ?>
</div>

</body>
</html>