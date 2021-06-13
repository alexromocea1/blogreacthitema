<?php

/*
    App : dossier src, dossier contenant toutes les classes de notre application, spécifié dans le composer.json
    Core : dossier src/Core
*/

namespace App\Core;

/*
    Le Routage doit récupérer l'URL et trouver le contrôleur et la méthode, reliés à la route (l'URL)
*/

class Routing
{
    /*
        Lister toutes les routes de l'application
            clé : la route
            valeur : array contenant le nom du controleur
    */
    private array $routes = [
        '/' => [
            'controller' => 'Homepage',
            'method' => 'index',
        ],
        '/contact' => [
            'controller' => 'ContactPage',
            'method' => 'index',
        ],
        '/quiNous' => [
            'controller' => 'QuiNousPage',
            'method' => 'index',
        ],
        '/annonces' => [
            'controller' => 'AnnoncePage',
            'method' => 'show4Best',
        ],
        '/modifier_user' => [
            'controller' => 'Login',
            'method' => 'update',
        ],
        '/annonces/bars' => [
            'controller' => 'Bars',
            'method' => 'showTableBars',
        ],
        '/annonces/bars/ajouter' => [
            'controller' => 'AnnoncePage',
            'method' => 'ajoutBars',
        ],
        '/annonces/bars/add' => [
            'controller' => 'Bars',
            'method' => 'addBars',
        ],
        '/annonces/bars/modifier' => [
            'controller' => 'AnnoncePage',
            'method' => 'updateBars',
        ],
        '/annonces/bars/update' => [
            'controller' => 'Bars',
            'method' => 'update',
        ],
        '/annonces/BN' => [
            'controller' => 'BN',
            'method' => 'showTableBN',
        ],
        '/annonces/BN/ajouter' => [
            'controller' => 'AnnoncePage',
            'method' => 'ajoutBN',
        ],
        '/annonces/BN/add' => [
            'controller' => 'BN',
            'method' => 'addBN',
        ],
        '/annonces/BN/modifier' => [
            'controller' => 'AnnoncePage',
            'method' => 'updateBN',
        ],
        '/annonces/BN/update' => [
            'controller' => 'BN',
            'method' => 'update',
        ],
        '/annonces/Bars/(?<id>\d+)' => [
            'controller' => 'AnnoncePage',
            'method' => 'BarsProductPage',
        ],
        '/annonces/BN/(?<id>\d+)' => [
            'controller' => 'AnnoncePage',
            'method' => 'BNProductPage',
        ],
        '/annonces/CommentsBN/add' => [
            'controller' => 'CommentsBN',
            'method' => 'addCommentsBN',
        ],
        '/annonces/CommentsBars/add' => [
            'controller' => 'CommentsBars',
            'method' => 'addCommentsBars',
        ],
        '/auth' => [
            'controller' => 'Authentication',
            'method' => 'index',
        ],
        '/admin/games' => [
            'controller' => 'Game',
            'method' => 'showTable',
        ],
        '/admin/game/form' => [
            'controller' => 'Game',
            'method' => 'createEntry',
        ],
        '/admin/game/add' => [
            'controller' => 'Game',
            'method' => 'add',
        ],
        '/admin/game/form/update' => [
            'controller' => 'Game',
            'method' => 'modifEntry',
        ],
        '/admin/game/form/update-fait' => [
            'controller' => 'Game',
            'method' => 'update',
        ],
        '/admin/game/form/delete' => [
            'controller' => 'Game',
            'method' => 'deleteEntry',
        ],
        '/admin/game/form/delete-fait' => [
            'controller' => 'Game',
            'method' => 'delete',
        ],
        '/admin/game/delete/(\d+)' => [
            'controller' => 'Game',
            'method' => 'deleteEntry',
        ],
        '/login' => [
            'controller' => 'Login',
            'method' => 'index',
        ],
        '/logout' => [
            'controller' => 'Logout',
            'method' => 'index',
        ],
        '/register' => [
            'controller' => 'Register',
            'method' => 'index',
        ],
        "/payment/(?<id>\w+)" => [
            'controller' => 'Payment',
            'method' => 'index'
        ],
        "/payment_processing" => [
            'controller' => 'Payment',
            'method' => 'process'
        ],
        "/legal" => [
            'controller' => 'Legal',
            'method' => 'index'
        ],

        /*
            utilisation d'une expression rationnelle
            () : création d'un groupe
            \d : chiffre
            + : 1 ou plusieurs
            ?<...> : nommer le groupe
        
        
        '/(?<id>\d+)' => [
            'controller' => 'Homepage',
            'method' => 'index',
        ],
        */

    ];

    //retourne le controlleur et la methode
    public function getRouteInfos(): array
    {

        //recupere la route(URL)
        $uri = $_SERVER["REQUEST_URI"];

        //Route par defaut
        $result = [
            'controller' => 'NotFound',
            'method' => 'index',
            'vars' => []
        ];

        //acceder à la route
        foreach ($this->routes as $regexp => $infos) {

            /*
            preg_match : teste la concordance avec une expression rationnelle
            3 params :
                -expression rationnelle
                - chaine à caractère à tester
                - récupèration des données
            */
            if (preg_match("#^$regexp$#", $uri, $groups)) {
                $result = $infos;
                $result["vars"] = $groups;
                break;
            }
        }

        //Dans les groupes des expressions rationnelles, ne conserver que les clefs non numérique
        foreach ($result["vars"] as $key => $value) {
            if (is_int($key)) {
                unset($result["vars"][$key]);
            }
        }

        return $result;
    }
}
