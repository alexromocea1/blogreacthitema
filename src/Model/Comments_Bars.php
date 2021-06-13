<?php

namespace App\Model;

class Comments_Bars
{
    private int $comment_id;
    private String $comment_description;
    private String $user;
    private int $reviews;
    private int $Bars_id;
    private string $date_creation;

    public function getComment_id():int { return $this->comment_id; }
    public function getComment_description():String { return $this->comment_description; }
    public function getUser():String { return $this->user; }
    public function getReviews():int { return $this->reviews; }
    public function getBars_id():int { return $this->Bars_id; }
    public function getDate_Creation():String { return $this->date_creation; }

    public function setComment_id(int $value):void { $this->comment_id = $value; }
    public function setComment_description(String $value):void { $this->comment_description = $value; }
    public function setUser(String $value):void { $this->user = $value; }
    public function setReviews(String $value):void { $this->reviews = $value; }
    public function setBars_id(String $value):void { $this->Bars_id = $value; }
    public function setDate_Creation(String $value):void { $this->date_creation = $value; }


}