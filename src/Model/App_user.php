<?php

namespace App\Model;

class App_user
{
    private int $id;
    private String $login;
    private String $password;
    private String $level;

    public function getId():int { return $this->id; }
    public function getLogin():String { return $this->login; }
    public function getPassword():String { return $this->password; }
    public function getLevel():String { return $this->level; }

    public function setLogin(String $value):void { $this->login = $value; }
    public function setPassword(String $value):void { $this->password = $value; }
    public function setLevel(String $value):void {$this->level = $value;}

}   