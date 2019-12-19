<?php   
session_start();
//Permet de garder le nom de l'utilisateur connecté

class Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    public $errorMsg = Array();
 
    public function __construct($db_name = 'ts', $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_name = $db_pass;
        $this->db_host = $db_host;
    }
    
//Permet la connexion à la base de données
    public function getPDO()
    {
        if($this->pdo == null)
        {
            $pdo = new PDO('mysql:dbname=ts;host=localhost', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

//Permet de preparer la fonction 'prepare' avec comme paramètre les élements necessaire    
    public function prepare($statement, $nom, $email, $pass)
    {
        
        $ver = $this->getPDO()->prepare($statement);
        if(isset($nom))
            $ver->bindParam(':nom', $nom);
        if(isset($email))
            $ver->bindParam(':mail', $email);
        if(isset($pass))
            $ver->bindParam(':mdp', $pass);
        $ver->execute();
        return $ver;
    }
//Permet la cononexion de l'utilsiateur 
    public function check($nom, $email, $pass)
    {
        
        if(isset($email))
        {
            $bnjr = '' ;

            $ver = $this->prepare('SELECT * from connect where mail=:mail', $name, $email, null);
            $stmt = $ver->fetch(PDO::FETCH_ASSOC);

            if($ver->rowcount()) 
            {          
                if(password_verify($pass, $stmt['mdp']))
                {
                    $user_name =  $stmt['nom'] ;
                    $_SESSION['nom'] = $user_name;
                    $bnjr = 'HELLO ' . $_SESSION['nom'] ;
                    header ('location: page.php') ;
                    
                }      
                else 
                {
                    echo '<p style="color:red"> Erreur lors de la tentative de connexion</p>' ;
                }  
            } 
             
            
        }    
    }

//Permet d'empecher l'accès à la page si l'utilisateur n'est pas connecté    
    public function deconnect()
    {
        if(!isset($_SESSION['nom'])) 
        {
            header ('location: noConnect.php') ;
        } 
            else 
        {
            echo '<center><font color="green" size="4"><b>Bienvenue<i><h1> ' .  $_SESSION['nom'] . '</h1></i></center></font><br />';            
        }
    }

}