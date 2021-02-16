<?php
class Comment {
    public ?int $Id = null;
    public int $Rating;
    public string $Text;
    public string $Date;
    private $Database;
    
    public function __construct($database){
        $this->Database=$database;
    }

    public function GetUser(){
        $commentResult = $this->Database->Query("SELECT `user_id` FROM `Comments` WHERE `comment_id` = ?", "s", $this->Id);
        $commentData = $commentResult->fetch_assoc();

        $user = new User($this->Database);
        $user->Get($commentData["user_id"]);
        
        return $user;
    }

    public function GetMovie(){
        $commentResult = $this->Database->Query("SELECT `movie_id` FROM `Comments` WHERE `comment_id` = ?", "s", $this->Id);
        $commentData = $commentResult->fetch_assoc();

        $movie = new Movie($this->Database);
        $movie->Get($commentData["movie_id"]);
        
        return $movie;
    }
    
    public function Delete(){
        $DeleteResult = $this->Database->Query("DELETE FROM `Comments` WHERE `comment_id` = ?", "s", $this->Id);
        return true;
    }

    public function Edit(){
        
    }

    public function Create($user_id, $movie_id){
        $getResult = $this->Database->Query("SELECT * FROM `Users` WHERE `user_id` = ?", "s", $user_id);
        if($getResult->num_rows == 0)
            throw new Exception("User does not exist");
        

        $getResult = $this->Database->Query("SELECT * FROM `Moives` WHERE `movie_id` = ?", "s", $movie_id);
        if($getResult->num_rows == 0)
            throw new Exception("Movie does not exist");
        
        $this->Database->Query("INSERT INTO `Comments` (`comment_id`, `user_id`, `movie_id`, `comment_rating`, `comment_text`, `comment_date`) VALUES (NULL, ?, ?, ?, ?, current_timestamp())", "ssss", $user_id, $movie_id, $this->Rating, $this->Text);

        return true;
    }

    public function Get($id){
        $getResult = $this->Database->Query("SELECT * FROM `Comments` WHERE `comment_id` = ?", "s", $id);
        if($getResult->num_rows == 0)
            throw new Exception("Comment does not exist");
        
        $getData = $getResult->fetch_assoc();
        $this->Id = $getData["comment_id"];
        $this->Rating = $getData["comment_rating"];
        $this->Text = $getData["comment_text"];
        $this->Date = $getData["comment_date"];
    }
  }
