<?php

namespace App\Core;

class Dotenv
{
    static public function load():void
    {
        // file : charger un fichier; créer un array où chaque ligne devient une entrée du tableau
        $file = file(__DIR__ . '/../../.env', FILE_IGNORE_NEW_LINES);

        // Parcourir le tableau pour insérer les variables dans $_ENV
        array_map(function($line){
            // séparation entre la clé et la valeur
            // crée un array
            $result = explode('=', $line);
            //echo '<pre>'; var_dump($result); echo '</pre>'; exit;

            // remplir la variable d'environnement $_ENV
            $_ENV[$result[0]] = $result[1]; 

        }, $file);
            
            

        //echo '<pre>'; var_dump($file); echo '</pre>'; exit;
    }
}