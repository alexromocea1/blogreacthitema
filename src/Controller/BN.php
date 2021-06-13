<?php 

namespace App\Controller;

use App\Core\Database;
use App\Query\BNQuery;
use PDO;
use App\Core\Container;
use App\Query\UserQuery;

class BN extends AbstractController
{
    public function showTableBN():void
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

         $BNQuery = Container::getInstance(BNQuery::class);
         $BN = $BNQuery->findAll();
         error_reporting(0);
        if($_POST['lieu'] != "" && $_POST['nbParticipants'] != "") {
          $Filter = $BNQuery->FindByFilter($_POST['lieu'], $_POST['nbParticipants']);
        }
        error_reporting(1);
         $this->render('Annonce/searchBN', [
               'BN' => $BN,
               "level" => $userLevel,
               "Filter" => $Filter,
         ]);
    }

    public function addBN()
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

      if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR){
        $gameQuery = Container::getInstance(BNQuery::class);
        $gameQuery->insertOne($_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description'], $_SESSION["login"], $_POST['adress'], $_POST['zip_code'] , $_POST['max_person']);
      }
      header('location: /annonces/BN');
    }

    public function update()
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

      if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR){
        $gameQuery = Container::getInstance(BNQuery::class);
        $gameQuery->ModifOne($_POST['id'], $_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description']);
      }
      header('location: /annonces/BN');
    }
}