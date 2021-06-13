<?php 

namespace App\Controller;

abstract class AbstractController
{
    protected function render(String $view, array $data = [], String $title = 'API'):void 
    {
        // extract : permet de convertir les clés d'un tableau en variables
        // ['key' => 10] = $key = 10
        extract($data);

        // affichage de la vue situé dans le dossier templates
        // __Dir__ : constante qui renvoie le dossier actif
        require_once __DIR__ . "/../../templates/$view.php";
    }

    protected function renderJSON(string $message, array $data = [], int $statusCode = 200):void
    {
        // code HTTP
        http_response_code($statusCode);
        
        // en-têtes CORS (Cross Origin Ressource Sharing)
        header('Content-Type : application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-HEADERS: Content-Type, Authorization');

        // affichage du JSON
        echo json_encode([
            'message' => $message,
            'data' => $data,
        ]);

    }
}