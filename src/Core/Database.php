<?php 

namespace App\Core;

use PDO;

class Database
{
    public function connect():\PDO
    {
        // connexion à la base de données
        $connection = new PDO(
            "mysql:host={$_ENV['DB_HOST']}; dbname={$_ENV['DB_NAME']}; charset=UTF8",
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            // par défaut, les erreurs de PDO ne s'affiche pas
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

            ]
        );

        return $connection;
    }
}