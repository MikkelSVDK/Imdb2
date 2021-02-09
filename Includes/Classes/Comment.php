<?php
class Comment {
    public ?int $Id = null;
    public int $Rating;
    public string $Text;
    public string $Date;
    private $Database;
    
    public function __construct($database){
        $this->Database=$database;
    }

    public function GetUser(){

    }
    
    public function Delete(){
        
    }

    public function Edit(){
        
    }

    public function Create(){
        
    }

    public function Get($id){
        $getResult = $this->Database->Query("SELECT * FROM `Comments` WHERE `comment_id` = ?", "s", $id);
        if($getResult->num_rows == 0)
            throw new Exception("Comment does not exist");
        
        $getData = $getResult->fetch_assoc();
        $this->Id = $getData["comment_id"];
        $this->Rating = $getData["comment_rating"];
        $this->Text = $getData["comment_text"];
        $this->Date = $getData["comment_date"];
    }
  }
