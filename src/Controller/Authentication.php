<?php 

namespace App\Controller;

class Authentication extends AbstractController
{
    public function index():void
    {
        // récupération du corps de la requête
        $body = json_encode(file_get_contents('php://input'));

        $this->renderJSON('coucou', [
            'bonjour' => 'bonsoir',
        ], 201);
    }
}