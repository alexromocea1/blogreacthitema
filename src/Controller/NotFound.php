<?php

namespace App\Controller;

class NotFound extends AbstractController
{
    public function index():void
    {
        // affichage de la vue contenue dans le dossier templates
        $this->render('not-found/index');
    }
}