<?php
include_once 'database.php' ;

class Employe extends Database 
{
    private $firstname;
    private $lastname;
    private $email;
    private $phone;
    private $id;

/**
 * Méthode pérmettant la récuperation des éléments dans la base de données
 * Ici, en paramètre ID  pour récupérer l'utilisateur suivant sont numéro identifiant dans la base (En AutoIncrement)
 * Le la ligne $request comporte la fonction SQL elle débute par la fameuse méthode getPDO permettant l'accès à la base.
 */
    public function getById(int $id)
    {
        $request = $this->getPDO()->prepare('SELECT id, firstname, lastname, email, phone FROM utilisateurs where id='.$id);

        $request->bindParam(':id', $id);
        $request->bindParam(':firstname', $firstname);
        $request->bindParam(':lastname', $lastname);
        $request->bindParam(':email', $email);
        $request->bindParam(':phone', $phone);
        $request->execute();

//Les éléments de la base sont insérés dans un tableau grâce au fetch on récupére tout

        $donnees=$request->fetch(PDO::FETCH_ASSOC);

        $this->firstname = $donnees['firstname'];
        $this->lastname = $donnees['lastname'];
        $this->email = $donnees['email'];
        $this->phone = $donnees['phone'];
        $this->id = $donnees['id'];

    }

//Getteur et Setteur des champs utile

    public function getFirstname() : string 
    {
        return $this->firstname ;
    }

    public function getLastname() : string 
    {
        return $this->lastname ;
    }

    public function getEmail() : string 
    {
        return $this->email ;
    }

    public function getPhone() : string 
    {
        return $this->phone ;
    }

    public function setFirstname() : string 
    {
        $this->firstname = $firstname;
    }

    public function setLastname() : string 
    {
        $this->lastname = $lastname;
    }

    public function setEmail() : string 
    {
        $this->email = $email;
    }

    public function setphone() : string 
    {
        $this->phone = $phone;
    }
}