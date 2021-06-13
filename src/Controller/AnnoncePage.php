<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\UserQuery;
use App\Query\BarsQuery;
use App\Query\BNQuery;
use App\Query\CommentsBarsQuery;
use App\Query\CommentsBNQuery;

class AnnoncePage extends AbstractController
{
    
    // id : variable d'URL
    /*public function index(int $id):void
    {
        $this->render('homepage/index', [
            'message' => $id,
        ]);
    }*/
    public function annoncePage():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/AnnoncePage',["level" => $userLevel]);
    }

    public function show4Best():void
    {
         $BarsQuery = Container::getInstance(BarsQuery::class);
         $BestBars = $BarsQuery->find4Best();
         $BNQuery = Container::getInstance(BNQuery::class);
         $BestBN = $BNQuery->find4Best();

         $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

         $this->render('Annonce/annoncePage', [
               'BestBars' => $BestBars,
               'BestBN' => $BestBN,
               "level" => $userLevel,
         ]);
    }

    public function searchBars():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/searchBars',["level" => $userLevel]);
    }
    public function searchBN():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/searchBN',["level" => $userLevel]);
    }
    public function BarsProductPage(array $data = []):void
    {
        $BarsQuery = Container::getInstance(BarsQuery::class);
        $id = $data["id"];
        $Bars = $BarsQuery->FindOne($id);
        $CommentBars = Container::getInstance(CommentsBarsQuery::class);
        $Comments = $CommentBars->FindCommentsByBars($id);

        $MoyReviews = Container::getInstance(CommentsBarsQuery::class);
        $Moy = $CommentBars->MoyReviews($id);

        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

        $this->render('Annonce/BarsproductPage',[
            "id" => $id,
            'Bars' => $Bars,
            "level" => $userLevel,
            "Comments" => $Comments,
            "Moy" => $Moy
            ]);
    }

    public function BNProductPage(array $data = []):void
    {
        $BNQuery = Container::getInstance(BNQuery::class);
        $id = $data["id"];  
        $BN = $BNQuery->FindOne($id);
        $CommentBars = Container::getInstance(CommentsBNQuery::class);
        $Comments = $CommentBars->FindCommentsByBars($id);
        $MoyReviews = Container::getInstance(CommentsBNQuery::class);
        $Moy = $CommentBars->MoyReviews($id);

        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

        $this->render('Annonce/BNproductPage',[
            "id" => $id,
            'BN' => $BN,
            "level" => $userLevel,
            "Comments" => $Comments,
            "Moy" => $Moy
            ]);
    }


    public function ajoutBars():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/annonceAjoutBars',["level" => $userLevel]);
    }
    public function ajoutBN():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/annonceAjoutBN',["level" => $userLevel]);
    }

    public function updateBars():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/annonceUpdateBars',["level" => $userLevel]);
    }

    public function updateBN():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/annonceUpdateBN',["level" => $userLevel] );
    }

}