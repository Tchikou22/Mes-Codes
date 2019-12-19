<?php 
include 'employe.php' ;
include 'message.php' ;

$mess1 = new message(); //Objet 
$mess1->getById(1);
var_dump($mess1);


$mess2 = new message();
$mess2->getById(2); //Eléments pour lequels les actions suivantes seront implanté
$mess2->delete();
$mess1->setTitle("Un nouveau titre");
$mess1->update();

