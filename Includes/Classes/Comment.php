<?php
class Comment {
    public int $Id = null;
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
  }
