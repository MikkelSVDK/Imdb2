<?php
class News {
    public int $Id = null;
    public string $Title;
    public string $Description;
    public string $Date;
    private $Database;
    
    public function __construct($database){
        $this->Database=$database;
    }
  }