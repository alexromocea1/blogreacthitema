<?php

namespace App\Controller;

class Legal extends AbstractController
{

    public function index():void
    {
        $this->render('legal/index');
    }
}