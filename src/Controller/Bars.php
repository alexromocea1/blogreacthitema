<?php 

namespace App\Controller;

use App\Core\Database;
use App\Query\BarsQuery;
use PDO;
use App\Core\Container;
use App\Query\UserQuery;

class Bars extends AbstractController
{
    public function showTableBars():void
    {
        $BarsQuery = Container::getInstance(BarsQuery::class);
        $Bars = $BarsQuery->findAll();
        error_reporting(0);
        if($_POST['lieu'] != "" && $_POST['nbParticipants'] != "") {
          $Filter = $BarsQuery->FindByFilter($_POST['lieu'], $_POST['nbParticipants']);
        }
        error_reporting(1);
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

        $this->render('Annonce/searchBars', [
               'Bars' => $Bars,
               "level" => $userLevel,
               "Filter" => $Filter,
        ]);
    }

   

    public function addBars()
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

      if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR){
        $gameQuery = Container::getInstance(BarsQuery::class);
        $gameQuery->insertOne($_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description'], $_SESSION["login"], $_POST['adress'], $_POST['zip_code'], $_POST['max_person'],$_POST['image']);
        $name = basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES['image'], "/admin/image/$name");
      }
      
      header('location: /annonces/bars');
    }

    public function update()
    {

      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

      if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR){
        $gameQuery = Container::getInstance(BarsQuery::class);
        $gameQuery->ModifOne($_POST['id'], $_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description'], $_POST['adress'], $_POST['zip_code']);
      }
      header('location: /annonces/bars');
    }

}