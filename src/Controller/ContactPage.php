<?php

namespace App\Controller;

class ContactPage extends AbstractController
{
    // id : variable d'URL
    /*public function index(int $id):void
    {
        $this->render('homepage/index', [
            'message' => $id,
        ]);
    }*/
    public function index():void
    {
        $this->render('Contact/contactPage');
    }
}