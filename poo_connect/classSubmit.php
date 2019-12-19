<?php 

require 'auth.php';

class Inscription extends Database 
{

    public function __construct($db_name = 'ts', $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_name = $db_pass;
        $this->db_host = $db_host;
    }

    public function inscription($nom, $email, $pass, $confirmPass)
    {
         if (isset($email)) 
        {
            if (empty($nom))
            {
                $this->errorMsg[]= '<p style="color:red"> Vous devez entrer un nom !</p>';  
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $this->errorMsg[]= '<p style="color:red"> Vous devez entrer un email valide !</p>';  
            }
            else if (strlen($pass) < 6)
            {   
                $this->errorMsg[]= '<p style="color:red"> Mot de passe trop cour</p>'; 
                var_dump($pass); 
            }
 
            else 
            {
                $ins = $this->prepare("INSERT INTO connect (nom, mail, mdp) VALUES (:nom, :mail, :mdp)", $nom,  $email, $pass);
                header ('location: submitDone.php') ;

            }       
        }
    }
}