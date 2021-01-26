<?php
class User {
    public int $Id = null;
    public string $Street;
    public string $City;
    public string $Country;
    
    private $Database;
    public function __construct($database){
        $this->Database=$database;
    }
  }