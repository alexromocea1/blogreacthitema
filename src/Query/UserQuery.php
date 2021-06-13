<?php

namespace App\Query;

use App\Core\Database;
use App\Model\App_User;
use App\Utils\StringUtils;
use PDO;




class UserQuery
{
    const VISITOR_INDICATOR = "visitor";
    const USER_INDICATOR = "user";
    const HOST_INDICATOR = "host";
    const ADMIN_INDICATOR = "admin";
    

    /*
        injection de dépendances : gérer les dépendances entre les objets 
        injection par le constructeur : 
            - créer une propriété du meme type que la classe supportée
            - créer le constructeur avec un paramètre du même type que la propriété
            - dans le constructeur, liaison entre la propriété et le paramètre du constructeur
    */

    private PDO $connection;

    public function __construct(Database $database)
    {
        // récupération de la connexion à la base de données
        $this->connection = $database->connect();
    }

    // requête des conditions sur les valeurs des colonnes
    // select user.* from App_user where user.login = 'admin';
    public function findOneBy(array $args = []):App_user|bool
    {
        // requête 
        $sql = '
            SELECT 
            App_user.*
            FROM App_user
            WHERE 
        ';

        /*
            requête préparée
            création de variables dans la requête avec :
        */
        foreach($args as $column => $value)
        {
            $sql .= "
                App_user.$column = :$column
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
        $result = $query->fetchObject(App_user::class);

        // retour des résultats 
        return $result;
    }
    
    // vérifier l'existance de l'utilisateur et le mot de passe
    public function checkUser(String $login, String $password):bool
    {
        // récupérer l'utilisateur
        $user = $this->findOneBy([
            'login' => $login,
        ]);

        /*
            password_verify : verifier le mot de passe
                mot de passe en clair
                hachage du mot de passe
        */ 
        if($user && password_verify($password, $user->getPassword()))
        {   
            return true;
        }

        return false;
    }

    public function getStoredUserLevel():String{
        
        $userLevel = $this::VISITOR_INDICATOR;
        
        if(isset($_SESSION["login"]) 
            && isset($_SESSION["password"])){

            $login = $_SESSION["login"];
            $password = $_SESSION["password"];
        }
        else
            return self::VISITOR_INDICATOR; 

        if(!$this->checkUser($login,$password))
            return self::VISITOR_INDICATOR; 

        $user = $this->findOneBy([
            'login' => $login
        ]);

        $level = $user->getLevel();

        if($level == "admin")
            return self::ADMIN_INDICATOR;
        if($level == "user")
            return self::USER_INDICATOR;
        if($level == "host")
            return self::HOST_INDICATOR;
        else
            return self::VISITOR_INDICATOR;

    }

    public function addUser(String $login, String $password):bool{

        if($this->findOneBy(["login" => $login]))
            return false;

        $treatedPassword = password_hash($password, PASSWORD_ARGON2I);

        $sql = "INSERT INTO App_user
        VALUE ( NULL, :login, :password,:level )";

        $query = $this->connection->prepare($sql);

        $args = [
            "login" => $login,
            "password" => $treatedPassword,
            "level" => self::USER_INDICATOR
        ];

        $query->execute($args);

        $_SESSION["id"] = $this->findOneBy(["login" => $login]);
        $_SESSION["login"] = $login;
        $_SESSION["password"] = $password;

        return true;

    }

    public function showAllUsers()
    {
        // requête 
        $sql = '
        SELECT * FROM `app_user`';


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

    public function ModifOne(String $pseudo, String $newlevel)
    {
        // requête 
        $sql = '
            UPDATE app_user
                SET level = :newlevel
            WHERE login = :pseudo
        ';

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'pseudo' => $pseudo,
            'newlevel' => $newlevel,
        ]);

        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }
    
}