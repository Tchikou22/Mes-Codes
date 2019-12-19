<?php
include "connect.php" ;
/***********************************INSCRIPTION DE L'UTILISATEUR***********************************/ 

$ipseudo = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS) ;
$iemail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS) ;
$imdp = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) ;
$iconfirmPass = filter_input(INPUT_POST, 'confirm_Password', FILTER_SANITIZE_SPECIAL_CHARS) ;

$alerte = "" ;

if (isset($ipseudo))
{
	$req = "INSERT INTO users (pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)";

	$reqResult = $dbh->prepare($req);

	$reqResult->bindParam(':pseudo', $ipseudo);
	$reqResult->bindParam(':mail', $iemail);
	$reqResult->bindParam(':mdp', $imdp);



     

	if ($imdp != $iconfirmPass )
	{
		    
        $alerte ="Erreur, les mots de passe ne correspondent pas.";
        header ('location: inscription.php') ;
    }
    
    else 
    {
        $exec = $reqResult->execute() ; 
    

        if (!$exec) {
            $alerte = "Ce contact existe déjà, merci de choisir un autre pseudo ou une autre adresse email.";
            //print_r($dbh->errorInfo());
         }
         else 
         {
            header ('location: index.php') ; 
         }

        

    }

}