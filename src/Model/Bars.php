<?php

namespace App\Model;

class Bars
{
    private int $id;
    private String $name;
    private String $lieu;
    private int $price;
    private string $date_creation;
    private string $description;
    private string $user;
    private String $adress;
    private int $zip_code;
    private int $max_person;

    public function getId():int { return $this->id; }
    public function getName():String { return $this->name; }
    public function getLieu():String { return $this->lieu; }
    public function getPrice():int { return $this->price; }
    public function getDate_Creation():String { return $this->date_creation; }
    public function getDescription():String { return $this->description; }
    public function getUser():String { return $this->user; }
    public function getAdress():String { return $this->adress; }
    public function getZip_code():int { return $this->zip_code; }
    public function getMax_person():int { return $this->max_person; }

    public function setName(String $value):void { $this->name = $value; }
    public function setLieu(String $value):void { $this->lieu = $value; }
    public function setPrice(String $value):void { $this->price = $value; }
    public function setDate_Creation(String $value):void { $this->date_creation = $value; }
    public function setDescription(String $value):void { $this->description = $value; }
    public function setAdress(String $value):void { $this->adress = $value; }
    public function setZip_code(int $value):void { $this->zip_code = $value; }
    public function setMax_person(int $value):void { $this->max_person = $value; }

}