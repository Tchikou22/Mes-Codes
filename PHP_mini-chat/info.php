<!doctype html>
<?php include "messdb.php" ; ?>
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
<a class="insc" href="deconnexion.php">SE DECONNECTER</a>   

<div id="nom">
    <?php echo $bjnr ?>
    <p>Votre message a bien été envoyé !<br>Revenir aux messages ?</p>
    <a class="insc" href="mess.php">Messagerie</a>  

</div>  




<div class="container">

    <img src="img/chat.png">

</div>

<div class="offset-md-6">

<?php  echo $info ?>

</div>

</body>
</html>