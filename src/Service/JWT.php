<?php

namespace App\Service;

use App\Utils\StringUtils;

class JWT
{
    // générer un JSON Web Token
    public function generate():string
    {
        /*
            étapes
                - encoder le header en base64URL
                - encoder le payload en base64URL
                - hacher le header et le paylod et les associer à un secret
        */

        // header : configuration du JWT
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT',

        ];

        $headerBase64 = StringUtils::base64url_encode(
          json_encode($header)  
        );

        // payload (charge utile) : données à transporter
        $payload = [
            'iat' => time(),
        ];
        $payloadBase64 = StringUtils::base64url_encode(
            json_encode($payload)
        );

        // création de la signature en utilisant la clé secrète 
        $signatureBase64 = StringUtils::base64url_encode(
            hash_hmac(
                'sha256',
                "$headerBase64.$payloadBase64",
                $_ENV['SECRET']

            )
        );

        // création du jeton
        $token = "$headerBase64.$payloadBase64.$signatureBase64";

        return $token;
    }

    // vérifier un JWT
    public function verify(string $token):bool
    {
        
        //eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE2MTM2NTU4NTZ9.NmQ1ZGEyYTc5ZGIzZjc5OTNmNWMxMzA5ODQ4YWM0ODhiMzljZDlkOWQ4MjIxZmI1ZWY0YjcxMzI0OTYyMDE0NA

        // séparer le header, du playload, de la signature
        [ $headerBase64, $payloadBase64, $signature ] = explode('.', $token);
        //var_dump($headerBase64, $payloadBase64, $signature); exit;
        // signature
        $signatureBase64 = StringUtils::base64url_encode(
            hash_hmac(
                'sha256',
                "$headerBase64.$payloadBase64",
                $_ENV['SECRET']
                )
            );

            // vérification de la signature
            // si la nouvelle signature est identique à la signature contenue dans le token
            $signatureVerify = $signatureBase64 == $signature ? true : false;

            return $signatureVerify;
    }
}