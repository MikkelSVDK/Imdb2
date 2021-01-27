<?php
class User {
    public int $Id = null;
    public string $Firstname;
    public string $Lastname;
    public string $Email;
    public int $Phone;
    public string $CreationDate;
    private $Database;

    public function __construct($database){
        $this->Database=$database;
    }
  }