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
<!-- 
<div class="offset-md-6">
    <p>BONJOUR</p>
    <img src="img/chat.png">
    <p>Bienvenue sur notre chat ! <br> Le sujet de conversation ? bah yen pas ? <br> Un monologue c'est ce qui se fait ici.<br>Bonne discution avec vous même.</p>
</div>
-->

<div id="nom">
    <?php echo $bjnr ?>
</div>  

<h1>TAPEZ VOTRE MESSAGE</h1>

<form method="POST" action ="mess.php">

    <!--
    <input type="text" name="nom" required placeholder="*Pseudo :">
    <input type="email" name="mail" required placeholder="*Email :"><br>
    -->
    <textarea name="text" required placeholder="*Tapez votre message ici :" rows="10" cols="100"></textarea>
  
    <input type="submit" value="Envoyez votre message" >


</form>


<?php echo $alerte ?>

<div class="container">

    
    <p><h1>Voici les messages des membres actifs :</h1><p>
<table>
    <tr>
        <th>Heures :</th>
        <th>Membres :</th>
        <th>Messages :</th>
    </tr>

    <tr>
       <td><?php echo $time ;?></td>
       <td><?php echo $vue ;?></td>
       <td><?php echo $membre ;?></td>
        
    </tr>

   
</table>

</div>




















</body>
</html>