<?php
class User {
    public int $Id = null;
    public string $Name;
    private $Database;

    public function __construct($database){
        $this->Database=$database;
    }
  }