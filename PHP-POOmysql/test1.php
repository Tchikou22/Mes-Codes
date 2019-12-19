<?php

include 'employe.php' ;
include 'message.php' ;


$emp1 = new Employe(); //Création d'un objet 
$emp1->getById(1); //Appel de la fonction getById avec en paramétre le numéro 1
var_dump($emp1); //Permet d'afficher un resultat en objet pour visualiser tous les éléments contenu dans la variabe $emp1


$mess1 = new message();
$mess1->setText("Bonjour à tout le monde");//Appel de la fonction setText avec en paramétre un message qui sera inséré en base de donnée
$mess1->setTitle("Coucou");//Message à insérer en base de donnée dans le champ titre
$mess1->setAuthor(1);//insértion de l'ID de l'auteur.

$mess1->save(); //Execution des requêtes, et insértion de tous les éléments demandé en paramètre plus haut



$mess2 = new message();
$mess2->setText("J'ai pas tout compris");
$mess2->setTitle("Chais pas");
$mess2->setAuthor(3);
$mess2->save();




