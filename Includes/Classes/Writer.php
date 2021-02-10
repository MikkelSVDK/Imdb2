<?php
class Writer {
    public ?int $Id = null;
    public string $Name;
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

    public function Get($id){
        $getResult = $this->Database->Query("SELECT * FROM `MovieWriters` WHERE `writer_id` = ?", "s", $id);
        if($getResult->num_rows == 0)
            throw new Exception("Writer does not exist");
        
        $getData = $getResult->fetch_assoc();
        $this->Id = $getData["writer_id"];
        $this->Name = $getData["writer_name"];
    }
  }