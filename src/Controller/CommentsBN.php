<?php 

namespace App\Controller;

use App\Core\Database;
use App\Query\CommentsBNQuery;
use PDO;
use App\Core\Container;
use App\Query\UserQuery;

class CommentsBN extends AbstractController
{
    public function showTableCommentsBN():void
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

         $CommentsBNQuery = Container::getInstance(CommentsBNQuery::class);
         $CommentsBN = $CommentsBNQuery->findAll();
         $this->render('Annonce/searchCommentsBN', [
               'CommentsBN' => $CommentsBN,
               "level" => $userLevel
         ]);
    }

    public function addCommentsBN()
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

      if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::USER_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR){
        $gameQuery = Container::getInstance(CommentsBNQuery::class);
        $gameQuery->insertOne($_POST['description'], $_POST['reviews'], $_SESSION["login"], $_POST['boites_de_nuit_id']);
      }
      header('location: /annonces/BN/'.$_POST['boites_de_nuit_id'].'');
    }

    public function update()
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

      if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::USER_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR){
        $gameQuery = Container::getInstance(CommentsBNQuery::class);
        $gameQuery->ModifOne($_POST['id'], $_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description']);
      }
      header('location: /annonces/CommentsBN');
    }
}