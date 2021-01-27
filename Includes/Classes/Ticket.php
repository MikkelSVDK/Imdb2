<?php
class User {
    public int $Id = null;
    public string $Fullname;
    public string $Email;
    public string $Message;
    private $Database;
    
    public function __construct($database){
        $this->Database=$database;
    }

    public function Delete(){
        
    }

    public function Edit(){
        
    }

    public function Create(){
        
    }
  }