<?php 

namespace App\Query;

use PDO;
use App\Model\Comments_Bars;
use App\Core\Database;


class CommentsBarsQuery
{

    public const CBars_INDICATOR = 'Comment_Bars';
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
            FROM API.comments_bars WHERE Bars_id ='.$id.'
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


    public function MoyReviews(int $id)
    {
        // requête 
        $sql = '
            SELECT AVG(reviews)
            FROM API.comments_bars WHERE Bars_id ='.$id.'
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
        SELECT bars.*, comments_bars.*
        FROM bars
        INNER JOIN comments_bars
        On (bars.id = comments_bars.Bars_id)
        WHERE comments_bars.user ="'.$login.'"';


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

    public function insertOne(String $description, int $reviews, String $user, int $Bars_id)
    {
        
        $sql = "INSERT INTO API.comments_bars
                    VALUES ('null', :description, :reviews, :user, :Bars_id, NOW())";
        
        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'description' => $description,
            'reviews' => $reviews,
            'user' => $user,
            'Bars_id' => $Bars_id,
        ]);
    }

    

    

    
    


}