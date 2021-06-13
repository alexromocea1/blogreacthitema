<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\UserQuery;

class Logout extends AbstractController
{

    public function index():void
    {
        unset($_SESSION["login"]);
        unset($_SESSION["password"]);


        $this->render('logout/index');
    }
}