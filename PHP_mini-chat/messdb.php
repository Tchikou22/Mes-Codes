<?php
include 'connect.php';
session_start();
/***********************************TRAITEMENT DES MESSAGES***********************************/ 

//$mpseudo = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS) ;
//$memail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS) ;
$mmess = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS) ;

$alerte = "" ;
$info = "" ; 

$idUser = $_SESSION["id"] ;
$mes = $_SESSION["text"] = $mmess ;
//$dbh->beginTransaction();

if (isset($idUser))
{

    $sql = "INSERT INTO messages (idUser, mess) VALUES (:idUser, :mess)";


	$sqlResult = $dbh->prepare($sql);

	$sqlResult->bindParam(':idUser', $idUser);
	$sqlResult->bindParam(':mess', $mmess);

    $exec = $sqlResult->execute() ; 

        if (!$exec)
        {
        $alerte =  " Entrez un message puis cliquez sur envoyer" ;
        
        }

        else  
        {
            $alerte =  "Votre message a bien été envoyé !" ;
            //header ('location: info.php') ;
            //$info = $mes ;
        
        } 
	
}


/***********************************RECUPERATION DES MESSAGES***********************************/ 
$vue = "" ;
$membre = "" ;
$time = "" ;
 
    //$messages = ('SELECT messages.time, users.pseudo , messages.mess FROM users INNER JOIN messages ON users.id = messages.idUser ORDER BY messages.time DESC '); 

    $messages = ('SELECT messages.time, users.pseudo , messages.mess FROM users INNER JOIN messages ON users.id = messages.idUser'); 


    $stmt= $dbh->prepare ($messages) ;
  
	//$stmt->closeCursor() ; 

    $stmt->execute(array()); 

    $donnees = $stmt->fetch() ;


while ($donnees = $stmt->fetch()) //Le while permet de faire une boucle et d'afficher tous les messages de la base. 
{

    $membre .= $donnees['mess'] . "<br><br>";

    $time .= $donnees['time'] . "<br><br>" ; 

    $vue .= $donnees ['pseudo'] . "<br><br>" ; //On met le point pour permettre au while de tout afficher    

}


   
$stmt->closeCursor() ; 

/***********************************NON DE L'UTILISATEUR***********************************/ 
$bjnr = "" ;

date_default_timezone_set('Europe/Paris');
$date = date('d/m/Y H:i');



if (isset($_SESSION["nom"])) 
{
    $bjnr = "Bonjour <h1> " . $_SESSION['nom']. "</h1>" . ' Nous sommes le ' . $date;
}
//$dbh->commit();