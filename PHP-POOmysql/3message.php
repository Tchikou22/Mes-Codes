<?php
include_once 'database.php' ;

class message extends Database
{
    private $author;
    private $texte;
    private $titre;
    private $id;

//methode setteur des éléments texte titre et author qui renverront les valeurs concerné

    public function setText(string $texte)
    {        
        $this->texte = $texte ;
    }

    public function setTitle(string $titre)
    {
        $this->titre = $titre ;
    }

    public function setAuthor(int $author)
    {
        $this->author = $author ;
    }

//methode save permet d'executer les requêtes d'insértion dans la base des champs 'texte', 'titre', 'autho'
    public function save()
    {

        $result = $this->getPDO()->prepare('INSERT INTO messages (texte, titre, author) VALUES (:texte , :titre, :author)');

        $result->bindParam(':texte', $this->texte);
        $result->bindParam(':titre', $this->titre);
        $result->bindParam(':author', $this->author);

        $result->execute();
        
    }

    //Methode getById, permet de recuperer les informations de la table par l'ID
    public function getById(int $id)
    {
        $request = $this->getPDO()->prepare('SELECT id, titre, texte, author FROM messages WHERE id='.$id);
        $request->bindParam(':id', $id);
        $request->bindParam(':titre', $titre);
        $request->bindParam(':texte', $texte);
        $request->bindParam(':author', $author);
        $request->execute();

        $donnees=$request->fetch(PDO::FETCH_ASSOC);

        $this->id = $donnees['id'];
        $this->titre = $donnees['titre'];
        $this->texte = $donnees['texte'];
        $this->author = $donnees['author'];
    }


/* *************************************/

/**
 * Fonction qui permet de supprimer un message de la base de donnée
 * L'élément supprimé sera l'id entré en paramètre de getById qui est appelé avant cette methode
 */
    public function delete() : int 
    { 
        $id=$this->id;
  
        $request = $this->getPDO()->prepare('DELETE FROM messages WHERE id=' .$id);
        $request->bindParam(':id', $id);

        $request->execute();  
    }
/**
 * Methode delete appelé pour mettre à jour ou modifier un élément de la base de donnée. Même méthode que la delete, 
 * L'élément mis à jour sera lié à l'id.
 */
    public function update()
    {
        $id=$this->id;
        $titre=$this->titre;


        $request = $this->getPDO()->prepare('UPDATE messages SET titre=:titre WHERE id='.$id);
        $request->bindParam(':titre', $titre);
        $request->execute();

    }
} 