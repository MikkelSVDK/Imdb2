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
        $deleteResult = $this->Database->Query("DELETE FROM `Tickets` WHERE `ticket_id` = ?", "s", $this->Id);
        return true;
    }

    public function Edit(){
        $editResult = $this->Database->Query("UPDATE `Tickets` SET `ticket_name` = ?, `ticket_email` = ?, `ticket_message` = ? WHERE `ticket_id` = ?", "ssss", $this->Fullname, $this->Email, $this->Message, $this->Id);
        return true;
    }

    public function Create(){
        $this->Database->Query("INSERT INTO `Tickets` (`ticket_name`, `ticket_email`, `ticket_message`) VALUES (?, ?, ?);", "sss", $this->Fullname, $this->Email, $this->Message);

        return true;
    }

    public function Get($id){
        $getResult = $this->Database->Query("SELECT * FROM `Tickets` WHERE `ticket_id` = ?", "s", $id);
        if($getResult->num_rows == 0)
            throw new Exception("Tickets does not exist");
        
        $getData = $getResult->fetch_assoc();
        $this->Id = $getData["ticket_id"];
        $this->Fullname = $getData["ticket_name"];
        $this->Email = $getData["ticket_email"];
        $this->Message = $getData["ticket_message"];


        return true;
    }
  }