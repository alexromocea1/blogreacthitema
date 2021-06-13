<?php

namespace App\Utils;

class StringUtils
{
    static public function base64url_encode($data):String {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
      }
      
      static public function base64url_decode($data):String {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
      }
}