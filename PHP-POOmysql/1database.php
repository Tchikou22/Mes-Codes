<?php
//Class permettant la connexion à la base de donnee

class Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    public $errorMsg = Array();
    
    /*
    *Fonction construct comporte les éléments nécéssaire à la connexion qui seront excuté à chaque nouvelle objet, 
    *il ne sera donc pas nécessaire d'avoir d'autre constrcutor dans les classes enfants 
    */
    public function __construct(string $db_name = 'ecf', string $db_user = 'root', string $db_pass = '', string $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_name = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * Methode getPDO, elle permet d'être récupérer lors des préparations des requêtes prepare.
     */
    public function getPDO()
    {
        if($this->pdo == null)
        {
            $pdo = new PDO('mysql:dbname=ecf;host=localhost', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

}