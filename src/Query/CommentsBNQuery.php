<?php 

namespace App\Query;

use PDO;
use App\Model\Comments_BN;
use App\Core\Database;


class CommentsBNQuery
{

    public const CBN_INDICATOR = 'Comment_BN';
    private PDO $connection;

    public function __construct(Database $database)
    {
        // récupération de la connexion à la base de données
        $this->connection = $database->connect();
    }


    public function FindCommentsByBars(int $id)
    {
        // requête 
        $sql = '
            SELECT *
            FROM API.comments_boites_de_nuit WHERE boites_de_nuit_id ='.$id.'
        ';

        /*
            requête préparée
            création de variables dans la requête avec :
        */

        
        
        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute();

        /*
            récupération des résultats
                fetchObject : permet d'associer les données à un modèle
                fetchAll : récupérer plusieurs résultats
        */
        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }

    public function insertOne(String $description, int $reviews, String $user, int $BN_id)
    {
        
        $sql = "INSERT INTO API.comments_boites_de_nuit
                    VALUES ('null', :description, :reviews, :user, :BN_id, NOW())";
        
        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'description' => $description,
            'reviews' => $reviews,
            'user' => $user,
            'BN_id' => $BN_id,
        ]);
    }


    public function MoyReviews(int $id)
    {
        // requête 
        $sql = '
            SELECT AVG(reviews)
            FROM API.comments_boites_de_nuit WHERE boites_de_nuit_id ='.$id.'
        ';

        /*
            requête préparée
            création de variables dans la requête avec :
        */

        
        
        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute();

        /*
            récupération des résultats
                fetchObject : permet d'associer les données à un modèle
                fetchAll : récupérer plusieurs résultats
        */
        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }


    public function FindCommentsByUsers(String $login)
    {
        // requête 
        $sql = '
        SELECT boites_de_nuit.*, comments_boites_de_nuit.*
        FROM boites_de_nuit
        INNER JOIN comments_boites_de_nuit
        On (boites_de_nuit.id = comments_boites_de_nuit.boites_de_nuit_id)
        WHERE comments_boites_de_nuit.user ="'.$login.'"';


        /*
            requête préparée
            création de variables dans la requête avec :
        */

        
        
        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute();

        /*
            récupération des résultats
                fetchObject : permet d'associer les données à un modèle
                fetchAll : récupérer plusieurs résultats
        */
        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }
    

    

    
    


}