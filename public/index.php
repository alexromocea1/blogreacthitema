<?php

session_start();

/*
    index.php : contrôler frontal (front controller)
        fichier appelé à chaque requête HTTP
*/

//  auto-chargement des classes avec composer
require_once '../vendor/autoload.php';

// import des classes
use App\Core\Dotenv;
use App\Core\Container;
use App\Core\Database;
use App\Core\Routing;
use App\Model\User;
use App\Query\UserQuery;
use App\Service\JWT;
use App\Controller\Game;
use App\Query\GameQuery;

// Chargement du fichier .env
Dotenv::load();
/*$db = new Database();
var_dump( $db->connect() ); exit;*/
$userQuery = Container::getInstance(UserQuery::class);
//echo '<pre>'; var_dump( $userQuery->checkUser('admin', 'admin')); echo '</pre>'; exit;

//$gameQuery = Container::getInstance(GameQuery::class);
//echo '<pre>'; var_dump( $gameQuery->findAll()); echo '</pre>'; exit;

//echo '<pre>'; var_dump($_ENV); echo '</pre>'; exit;
$jwt = Container::getInstance(JWT::class);
//echo '<pre>'; var_dump( $jwt->generate() ); echo '</pre>';

//echo '<pre>'; var_dump( $jwt->verify('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE2MTM2NTc4NzF9.NzdhYmZiN2Q0MTM4YWRhNGM0ODU2ZTdlNmI4ZGUxYThlNWRmMmI1OTA0MzAwZGE2NWFiYzM2MTAzNDEzMmY0MA') ); echo '</pre>'; exit;



// Routing
//$routing = new Routing();

// Propriété statique créée sur tous les objets qui permet de récupérer l'espace de nom sous forme de chaîne de caractères
$routing = Container::getInstance( Routing::class );
$routeInfos = $routing->getRouteInfos();


// espace de noms du contrôleur : App\Controller\..
$controllerName = "App\Controller\\{$routeInfos['controller']}";
//echo '<pre>'; var_dump($routeInfos); echo '</pre>'; exit;

// Instanciation du contrôleur
$controller = Container::getInstance($controllerName);

//appel de la méthode
// ... spread operator : permet de convertir des tableaux associatifs en arguments
// [ 'id' => 50] > id=50,

$controller->{$routeInfos['method']}($routeInfos['vars'] );


