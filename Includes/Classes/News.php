<?php
class News {
    public ?int $Id = null;
    public string $Title;
    public string $Description;
    public string $Date;
    private $Database;
    
    public function __construct($database){
        $this->Database=$database;
    }

    public function GetUser(){
        $userResult = $this->Database->Query("SELECT `Users`.`user_id` FROM `News` JOIN `Users` ON `Users`.`user_id` = `News`.`user_id` WHERE `News`.`news_id` = ?", "s", $this->Id);
        $userData = $userResult->fetch_assoc();

        $User = new User($this->Database);
        $User->Get($userData["user_id"]);
        return $User;
    }
    
    public function Delete(){
        $deleteResult = $this->Database->Query("DELETE FROM `News` WHERE `news_id` = ?", "s", $this->Id);
        return true;
    }

    public function Edit(){
        $editResult = $this->Database->Query("UPDATE `News` SET `news_title` = ?, `news_description` = ? WHERE `news_id` = ?", "sss", $this->Title, $this->Description, $this->Id);
        return true;
    }

    public function Create($user_id){
        $createResult = $this->Database->Query("INSERT INTO `News` (`news_id`, `user_id`, `news_title`, `news_description`, `news_date`) VALUES (NULL, ?, ?, ?, current_timestamp())", "sss", $user_id, $this->Title, $this->Description);
        $this->Id = $this->Database->GetLastInsertedId();
        return true;
    }

    public function Get($id){
        $getResult = $this->Database->Query("SELECT * FROM `News` WHERE `news_id` = ?", "s", $id);
        if($getResult->num_rows == 0)
            throw new Exception("News does not exist");
        
        $getData = $getResult->fetch_assoc();
        $this->Id = $getData["news_id"];
        $this->Title = $getData["news_title"];
        $this->Description = $getData["news_description"];
        $this->Date = $getData["news_date"];

        return true;
    }
  }