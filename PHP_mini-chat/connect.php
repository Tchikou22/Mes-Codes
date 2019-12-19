<?php

$user = "root";
$pass = "";


try 
{
    $dbh = new PDO('mysql:host=localhost; dbname=minichat', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
} 
