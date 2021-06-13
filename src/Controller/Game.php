<?php

namespace App\Controller;

use App\Core\Database;
use App\Query\GameQuery;
use PDO;
use App\Core\Container;

class Game extends AbstractController
{

   public function showTable():void
    {
         $gameQuery = Container::getInstance(GameQuery::class);
         $games = $gameQuery->findAll();
         $this->render('Products/Games', [
               'games' => $games,
         ]);
    }

   

    public function createEntry():void
    {
      $this->render('Products/GamesForm');
      $gameQuery = Container::getInstance(GameQuery::class);
         $games = $gameQuery->findAll();
    }

    public function add()
    {
      $gameQuery = Container::getInstance(GameQuery::class);
      $gameQuery->insertOne($_POST['name'], $_POST['plateform'], $_POST['price']);
      header('location: /admin/games');
    }

    public function modifEntry()
    {
      $this->render('Products/GamesFormUpdate');
    }

    public function update()
    {
      $gameQuery = Container::getInstance(GameQuery::class);
      $gameQuery->ModifOne($_POST['id'], $_POST['name'], $_POST['plateform'], $_POST['price']);
      header('location: /admin/games');
    }
    
    
    public function deleteEntry():void
    {
      $this->render('Products/GamesFormDelete');
    }

    public function delete()
    {
      $gameQuery = Container::getInstance(GameQuery::class);
      $gameQuery->deleteOne($_POST['id']);
      header('location: /admin/games');
    }
}