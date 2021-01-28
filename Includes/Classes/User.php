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
        $this->Database = $database;
    }

    public function GetAddress(){
        $addressResult = $this->Database->Query("SELECT `AddressBook`.`address_steet`, `AddressBook`.`address_city`, `AddressBook`.`address_country` FROM `Users` JOIN `AddressBook` ON `AddressBook`.`address_id` = `Users`.`address_id` WHERE `Users`.`user_id` = ?", "s", $this->Id);
        if($addressResult->num_rows == 0)
            throw new Exception("User does not have an address");
    
        $addressData = $addressResult->fetch_assoc();
        @return $addressData;
    }

    public function GetImage(){
        $imageResult = $this->Database->Query("SELECT CONCAT(`ImageLocations`.`image_location`, `Images`.`image_name`) AS `image` FROM `Users` JOIN `Images` ON `Images`.`image_id` = `Users`.`image_id` JOIN `ImageLocations` ON `ImageLocations`.`image_location_id` = `Images`.`image_location_id` WHERE `Users`.`user_id` = ?", "s", $this->Id);
        if($imageResult->num_rows == 0)
            throw new Exception("User does not have an image");
        
        $imageData = $imageResult->fetch_assoc();
        return string $imageData["image"];
    }

    public function IsAdmin(){
        $roleResult = $this->Database->Query("SELECT `user_admin` FROM `Users` WHERE `user_id` = ?", "s", $this->Id);
        if($roleResult->num_rows == 0)
            throw new Exception("Database error");

        $roleData = $roleResult->fetch_assoc();
        return boolean $roleData["user_admin"] == 1;
    }
    
    public function Delete(){
        $deleteResult = $this->Database->Query("DELETE FROM `Users` WHERE `user_id` = ?", "s", $this->Id);

        return boolean $deleteResult->affected_rows > 0;
    }

    public function Edit(){
        
    }

    public function Create(){
        
    }

    public function Get($id){
        $getResult = $this->Database->Query("SELECT  `user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_phone`, `user_creation_date` FROM `Users` WHERE `user_id` = ?", "s", $id);
        if($getResult->num_rows == 0)
            throw new Exception("User does exist");
        
        $getData = $getResult->fetch_assoc();
        $this->Id = $getData["user_id"];
        $this->Firstname = $getData["user_firstname"];
        $this->Lastname = $getData["user_lastname"];
        $this->Email = $getData["user_email"];
        $this->Phone = $getData["user_phone"];
        $this->CreationDate = $getData["user_creation_date"];
    }
  }