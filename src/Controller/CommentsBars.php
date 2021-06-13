<?php 

namespace App\Controller;

use App\Core\Database;

use PDO;
use App\Core\Container;
use App\Query\CommentsBarsQuery;
use App\Query\UserQuery;

class CommentsBars extends AbstractController
{
    public function showTableCommentsBars():void
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

         $CommentsBarsQuery = Container::getInstance(CommentsBarsQuery::class);
         $CommentsBars = $CommentsBarsQuery->findAll();
         $this->render('Annonce/searchCommentsBars', [
               'CommentsBars' => $CommentsBars,
               "level" => $userLevel
         ]);
    }

    public function addCommentsBars()
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

      if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::USER_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR){
        $gameQuery = Container::getInstance(CommentsBarsQuery::class);
        $gameQuery->insertOne($_POST['description'], $_POST['reviews'], $_SESSION["login"], $_POST['boites_de_nuit_id']);
      }
      header('location: /annonces/Bars/'.$_POST['boites_de_nuit_id'].'');
    }

    public function update()
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

      if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::USER_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR){
        $gameQuery = Container::getInstance(CommentsBarsQuery::class);
        $gameQuery->ModifOne($_POST['id'], $_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description']);
      }
      header('location: /annonces/CommentsBars');
    }
}