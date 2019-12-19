<?php
include 'connect.php';
/***********************************CONNEXION DE L'UTILISATEUR***********************************/ 
session_start();

$cpseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
$cpassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

$alerte = "" ;

$_SESSION["nom"] = $cpseudo ;
//$_SESSION["mail"] = $memail ;



if(isset($cpseudo)) 
{
        
    $user = ('SELECT id from users where pseudo=:pseudo AND mdp=:mdp'); 
    $stmt= $dbh->prepare ($user) ;
    $stmt->bindParam(':pseudo', $cpseudo);
    $stmt->bindParam(':mdp', $cpassword);
     

    $stmt->execute(); 
    
    if($stmt->rowcount()) 
    { 

        $donnees = $stmt->fetch();
        $id = $donnees ['id'] ;
        $_SESSION["id"] = $id ;

        header ('location: mess.php') ;
    }   
    else 
    {
        //header ('index.php') ;
        $alerte =  "<br>Une erreur est survenue lors de la tentative de connexion, merci de reesayer !<br>
        Vérifier votre pseudo ou votre mot de passe. <br> Si vous n'avez pas encore de compte, suivez le lien pour en créer. " ;
    }
}