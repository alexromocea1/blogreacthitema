<?php

class Game
{
    private int $id;
    private String $name;
    private String $console;
    private int $price;

    public function getId():int { return $this->id; }
    public function getName():String { return $this->name; }
    public function getConsole():String { return $this->console; }
    public function getPrice():int { return $this->price; }

    public function setName(String $value):void { $this->name = $value; }
    public function setConsole(String $value):void { $this->console = $value; }
    public function setPrice(String $value):void { $this->price = $value; }


}