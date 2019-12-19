<?php


class Bdd
{
    private $user = 'root' ;
    private $pass = '' ;
    private $host = 'localhost' ;
    private $dbname = 'ts' ;

    public function connect()
    {
        try 
        {
            $dbh = new PDO('mysql:host=$host; dbname=$dbname', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } 
            catch (PDOException $e) 
            {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            } 
    }


}
