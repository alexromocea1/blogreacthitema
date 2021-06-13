<?php 

namespace App\Query;

use PDO;
use App\Model\Location;
use App\Core\Database;


class LocationQuery
{
    private PDO $connection;

    public function __construct(Database $database)
    {
        // récupération de la connexion à la base de données
        $this->connection = $database->connect();
    }

    public function findOneBy(array $args = []):Location|bool
    {
        // requête 
        $sql = '
            SELECT 
            API.Location_salle.*
            FROM Location_salle
            WHERE 
        ';

        /*
            requête préparée
            création de variables dans la requête avec :
        */
        foreach($args as $column => $value)
        {
            $sql .= "
            Location_salle.$column = :$column
            ";
        }

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute($args);

        /*
            récupération des résultats
                fetchObject : permet d'associer les données à un modèle
                fetchAll : récupérer plusieurs résultats
        */
        $result = $query->fetchObject(Location::class);

        // retour des résultats 
        return $result;
    }

    public function findAll()
    {
        // requête 
        $sql = '
            SELECT *
            FROM API.Location_salle
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

    public function getDates()
    {
        // requête 
        $sql = '
        SELECT * FROM `calendar` 
        WHERE cdate BETWEEN CURRENT_DATE AND DATE_ADD(CURRENT_DATE, INTERVAL 12 MONTH) AND 
        cdate NOT IN(SELECT location_Date FROM location_salle WHERE bar_Id = 1)  

        ';
        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute();
        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }

    public function insertOne(
	int $user_Id ,
	$bar_Id,
    $bn_Id ,
    float $price ,
	string $location_Date,
    int $person_nbr)
    {
        
        $sql = "INSERT INTO API.Location_salle
                    VALUES ('null', :user_id, :bar_Id, :bn_Id, :price, :location_Date, :person_nbr )";
        
        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'user_id' => $user_Id,
            'bar_Id' => $bar_Id,
            'bn_Id' => $bn_Id,
            'price' => $price,
            'location_Date' => $location_Date,
            'person_nbr' => $person_nbr,
        ]);
    }

    /*public function ModifOne(int $id, String $name, String $lieu, float $price, String $description)
    {
        // requête 
        $sql = '
            UPDATE API.boites_de_nuit
                SET name = :name, lieu = :lieu, price = :price, date_creation = NOW(), description = :description
            WHERE id = :id
        ';

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'id' => $id,
            'name' => $name,
            'lieu' => $lieu,
            'price' => $price,
            'description' => $description,
        ]);

        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }

    public function deleteOne(int $id)
    {
        // requête 
        $sql = '
            DELETE FROM API.boites_de_nuit WHERE id= :id
        ';

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'id' => $id,
        ]);

        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }

    public function FindOne(int $id)
    {
        // requête 
        $sql = '
            SELECT * FROM API.boites_de_nuit WHERE id= :id
        ';

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'id' => $id
        ]);

        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }*/
    


}