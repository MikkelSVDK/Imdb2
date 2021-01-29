<?php
class User {
    public ?int $Id = null;
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
        return $addressData;
    }

    public function GetImage(){
        $imageResult = $this->Database->Query("SELECT CONCAT(`ImageLocations`.`image_location`, `Images`.`image_name`) AS `image` FROM `Users` JOIN `Images` ON `Images`.`image_id` = `Users`.`image_id` JOIN `ImageLocations` ON `ImageLocations`.`image_location_id` = `Images`.`image_location_id` WHERE `Users`.`user_id` = ?", "s", $this->Id);
        if($imageResult->num_rows == 0)
            throw new Exception("User does not have an image");
        
        $imageData = $imageResult->fetch_assoc();
        return $imageData["image"];
    }

    public function IsSignedIn(){
        return $this->Id != null;
    }

    public function IsAdmin(){
        $roleResult = $this->Database->Query("SELECT `user_admin` FROM `Users` WHERE `user_id` = ?", "s", $this->Id);
        if($roleResult->num_rows == 0)
            throw new Exception("Database error");

        $roleData = $roleResult->fetch_assoc();
        return $roleData["user_admin"] == 1;
    }
    
    public function Delete(){
        $deleteResult = $this->Database->Query("DELETE FROM `Users` WHERE `user_id` = ?", "s", $this->Id);

        return $deleteResult->affected_rows > 0;
    }

    public function Edit(){
        
    }

    public function Create($password, $address_street, $address_city, $address_country){
        $createResult = $this->Database->Query("SELECT * FROM `Users` WHERE `user_email` = ?", "s", $this->Email);
        if($createResult->num_rows > 0)
            throw new Exception("User allready exists");
        
        $createAddressResult = $this->Database->Query("SELECT `address_id` FROM `AddressBook` WHERE `address_steet` = ? AND `address_city` = ? AND `address_country` = ?", "sss", $address_street, $address_city, $address_country);
        if($createAddressResult->num_rows > 0){
            $addressData = $createAddressResult->fetch_assoc();
            $address_id = $addressData["address_id"];
        }else{
            $this->Database->Query("INSERT INTO `AddressBook` (`address_id`, `address_steet`, `address_city`, `address_country`) VALUES (NULL, ?, ?, ?)", "sss", $address_street, $address_city, $address_country);
            $address_id = $this->Database->GetLastInsertedId();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->Database->Query("INSERT INTO `Users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_phone`, `address_id`, `user_password`, `image_id`, `user_admin`, `user_creation_date`) VALUES (NULL, ?, ?, ?, ?, ?, ?, 1, 0, current_timestamp())", "ssssss", $this->Firstname, $this->Lastname, $this->Email, $this->Phone, $address_id, $hashedPassword);
        $this->Id = $this->Database->GetLastInsertedId();
        $this->CreationDate = date("Y-m-d H:i:s");

        return true;
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