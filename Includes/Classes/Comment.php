<?php
class User {
    public int $Id = null;
    public int $Rating;
    public string $Text;
    public int $Date;
    
    private $Database;
    public function __construct($database){
        $this->Database=$database;
    }
  }