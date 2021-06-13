<?php

namespace App\Core;

use App\Controller\AnnoncePage;
use App\Controller\Authentication;
use App\Controller\Homepage;
use App\Controller\NotFound;
use App\Model\User;
use App\Query\UserQuery;
use App\Service\JWT;
use App\Controller\Game;
use App\Query\GameQuery;
use App\Controller\Login;
use App\Controller\Logout;
use App\Controller\BN;
use App\Query\BNQuery;
use App\Controller\Bars;
use App\Controller\CommentsBars;
use App\Controller\CommentsBN;
use App\Controller\ContactPage;
use App\Controller\Legal;
use App\Controller\Payment;
use App\Controller\QuiNousPage;
use App\Query\BarsQuery;
use App\Controller\Register;
use App\Model\App_user;
use App\Query\CommentsBarsQuery;
use App\Query\CommentsBNQuery;
use App\Query\LocationQuery;

/*
require_once __DIR__ ."/../Query/CommentsBNQuerry.php";
require_once __DIR__ ."/../Query/CommentsBarsQuerry.php";
*/
/*
    Conteneurs d'instances des classes utilisées dans l'application cette classe renvoie les instances
*/

class Container
{
   static public function getInstance(String $namespace)
   {
      /*
            Une fonction est utilisée pour différer l'instanciation
        */

      $instances = [
         NotFound::class => function () {
            return new \App\Controller\NotFound();
         },
         Homepage::class => function () {
            return new \App\Controller\Homepage();
         },
         Authentication::class => function () {
            return new \App\Controller\Authentication(
               self::getInstance(UserQuery::class),
            );
         },
         AnnoncePage::class => function () {
            return new \App\Controller\AnnoncePage();
         },
         ContactPage::class => function () {
            return new \App\Controller\ContactPage();
         },
         QuiNousPage::class => function () {
            return new \App\Controller\QuiNousPage();
         },
         Login::class => function () {
            return new \App\Controller\Login();
         },
         Logout::class => function () {
            return new \App\Controller\Logout();
         },
         Register::class => function () {
            return new \App\Controller\Register();
         },
         Payment::class => function () {
            return new \App\Controller\Payment();
         },
         Legal::class => function () {
            return new \App\Controller\Legal();
         },
         BN::class => function () {
            return new \App\Controller\BN();
         },
         BNQuery::class => function () {
            return new \App\Query\BNQuery(
               self::getInstance(Database::class),
            );
         },
         Bars::class => function () {
            return new \App\Controller\Bars();
         },
         BarsQuery::class => function () {
            return new \App\Query\BarsQuery(
               self::getInstance(Database::class),
            );
         },
         CommentsBN::class => function () {
            return new \App\Controller\CommentsBN();
         },
         CommentsBNQuery::class => function () {
            return new \App\Query\CommentsBNQuery(
               self::getInstance(Database::class),
            );
         },
         CommentsBars::class => function () {
            return new \App\Controller\CommentsBars();
         },
         CommentsBarsQuery::class => function () {
            return new \App\Query\CommentsBarsQuery(
               self::getInstance(Database::class),
            );
         },
         LocationQuery::class => function () {
            return new \App\Query\LocationQuery(
               self::getInstance(Database::class),
            );
         },
         Routing::class => function () {
            return new \App\Core\Routing();
         },
         Game::class => function () {
            return new \App\Controller\Game();
         },
         GameQuery::class => function () {
            return new \App\Query\GameQuery(
               self::getInstance(Database::class),
            );
         },


         Database::class => function () {
            return new \App\Core\Database();
         },
         Dotenv::class => function () {
            return new \App\Core\Dotenv();
         },
         App_user::class => function () {
            return new \App\Model\App_user();
         },
         UserQuery::class => function () {
            return new \App\Query\UserQuery(
               self::getInstance(Database::class),
            );
         },
         JWT::class => function () {
            return new \App\Service\JWT();
         }
      ];

      return $instances[$namespace]();
   }
}
