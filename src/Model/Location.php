<?php

namespace App\Model;

class Location
{
    private int $location_Id ;
	private int $user_Id ;
	private int $bar_Id ;
    private int $bn_Id;
    private float $price;
	private string $location_Date;

    public function getLocation_Id():int { return $this->location_Id; }
    public function getUser_Id():int { return $this->user_Id; }
    public function getBar_Id():int { return $this->bar_Id; }
    public function getBn_Id():int { return $this->bn_Id; }
    public function getPrice():float { return $this->price; }
    public function getLocation_Date():String { return $this->date_creation; }


    public function setLocation_Id(int $value):void { $this->location_Id = $value; }
    public function setUser_Id(int $value):void { $this->user_Id = $value; }
    public function setBar_Id(int $value):void { $this->bar_Id = $value; }
    public function setBn_Id(int $value):void {  $this->bn_Id = $value; }
    public function setPrice(float $value):void {  $this->price = $value; }
    public function setLocation_Date(String $value):void {  $this->date_creation = $value; }
}