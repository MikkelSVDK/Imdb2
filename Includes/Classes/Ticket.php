<?php
class Ticket {
    public ?int $Id = null;
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
        $this->Database->Query("INSERT INTO `msv_ibdb2`.`Tickets` (`ticket_name`, `ticket_email`, `ticket_message`) VALUES (?, ?, ?);", "sss", $this->Fullname, $this->Email, $this->Message);

        return true;
    }
  }