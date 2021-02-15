<?php
class Movie {
    public ?int $Id = null;
    public string $Title;
    public int $Length;
    public int $AgeRating;
    public string $Description;
    public string $ReleaseDate;
    public int $Rating;
    public string $TrailerLink;
    private $Datbase;

    public function __construct($database){
        $this->Database = $database;
    }

    public function GetImage(){
        $imageResult = $this->Database->Query("SELECT CONCAT(`ImageLocations`.`image_location`, `Images`.`image_name`) AS `image` FROM `Moives` JOIN `Images` ON `Images`.`image_id` = `Moives`.`image_id` JOIN `ImageLocations` ON `ImageLocations`.`image_location_id` = `Images`.`image_location_id` WHERE `Moives`.`movie_id` = ?", "s", $this->Id);
        if($imageResult->num_rows == 0)
            throw new Exception("Movie does not have an image");
        
        $imageData = $imageResult->fetch_assoc();
        return "/img/".$imageData["image"];
    }

    public function GetComments(){
        $comments = [];
        
        $commentResult = $this->Database->Query("SELECT `comment_id` FROM `Comments` WHERE `movie_id` = ? ORDER BY `Comments`.`comment_date` DESC", "s", $this->Id);
        while($commentData = $commentResult->fetch_assoc()){
            $Comment = new Comment($this->Database);
            $Comment->Get($commentData["comment_id"]);
            array_push($comments, $Comment);
        }

        return $comments;
    }

    public function GetGenres(){
        $genres = [];

        $genreResult = $this->Database->Query("SELECT `genre_id` FROM `MovieGenresRelations` WHERE `movie_id` = ?", "s", $this->Id);
        while($genreData = $genreResult->fetch_assoc()){
            $Genre = new Genre($this->Database);
            $Genre->Get($genreData["genre_id"]);
            array_push($genres, $Genre);
        }

        return $genres;
    }

    public function GetDirectors(){
        $directors = [];

        $directorResult = $this->Database->Query("SELECT `writer_id` FROM `MovieWritersRelations` WHERE `is_director` = 1 AND `movie_id` = ?", "s", $this->Id);
        while($directorData = $directorResult->fetch_assoc()){
            $Writer = new Writer($this->Database);
            $Writer->Get($directorData["writer_id"]);
            array_push($directors, $Writer);
        }

        return $directors;
    }

    public function SetDirectors($directorArray){
        foreach($directorArray as $director){
            $writersRelationsResult=$this->Database->Query("SELECT * FROM `MovieWritersRelations` JOIN `MovieWriters` ON `MovieWriters`.`writer_id` = `MovieWritersRelations`.`writer_id` WHERE `MovieWriters`.`writer_name` = ? AND `MovieWritersRelations`.`is_director` = 1", "s", $director);
            if($writersRelationsResult->num_rows>0) {
            /*    $writerVariable = $writersRelationsResult->fetch_assoc();
                if(!$writerVariable["is_director"]) 
                    $this->Database->Query("UPDATE `MovieWritersRelations` SET `is_director` = 1 WHERE `MovieWritersRelations`.`writer_relation_id` = ?", "s", $writerVariable["writer_relation_id"]);
            */ } else {
                
                $writersResult = $this->Database->Query("SELECT * FROM `MovieWriters` WHERE `writer_name` = ?", "s", $director);
                if($writersResult->num_rows>0) {
                    $writerData = $writerResult->fetch_assoc();
                    $this->Database->Query("INSERT INTO `MovieWritersRelations` (`writer_relation_id`, `writer_id`, `movie_id`, `is_director`) VALUES (NULL, ?, ?, 1)", "ss", $writersData["writer_id"], $this->Id);
                }   else {
                    $this->Database->Query("INSERT INTO `MovieWriters` (`writer_id`, `writer_name`) VALUES (NULL, ?)", "s", $director);
                    $writer_id = $this->Database->GetLastInsertedId();
                    $this->Database->Query("INSERT INTO `MovieWritersRelations` (`writer_relation_id`, `writer_id`, `movie_id`, `is_director`) VALUES (NULL, ?, ?, 1)", "ss", $writer_id, $this->Id);
                }
            }
        }
    }

    public function GetWriters(){
        $writers = [];

        $writerResult = $this->Database->Query("SELECT `writer_id` FROM `MovieWritersRelations` WHERE `is_director` = 0 AND `movie_id` = ?", "s", $this->Id);
        while($writerData = $writerResult->fetch_assoc()){
            $Writer = new Writer($this->Database);
            $Writer->Get($writerData["writer_id"]);
            array_push($writers, $Writer);
        }

        return $writers;
    }
    public function SetWriters($writerArray){
        foreach($writerArray as $writer){
            $writersRelationsResult=$this->Database->Query("SELECT * FROM `MovieWritersRelations` JOIN `MovieWriters` ON `MovieWriters`.`writer_id` = `MovieWritersRelations`.`writer_id` WHERE `MovieWriters`.`writer_name` = ? AND `MovieWritersRelations`.`is_director` = 0", "s", $writer);
            if($writersRelationsResult->num_rows>0) {
                /*$writerVariable = $writersRelationsResult->fetch_assoc();
                if($writerVariable["is_director"])
                    $this->Database->Query("UPDATE `MovieWritersRelations` SET `is_director` = 0 WHERE `MovieWritersRelations`.`writer_relation_id` = ?", "s", $writerVariable["writer_relation_id"]);
            */ } else {
                
                $writersResult = $this->Database->Query("SELECT * FROM `MovieWriters` WHERE `writer_name` = ?", "s", $writer);
                if($writersResult->num_rows>0) {
                    $writerData = $writerResult->fetch_assoc();
                    $this->Database->Query("INSERT INTO `MovieWritersRelations` (`writer_relation_id`, `writer_id`, `movie_id`, `is_director`) VALUES (NULL, ?, ?, 0)", "ss", $writersData["writer_id"], $this->Id);
                }   else {
                    $this->Database->Query("INSERT INTO `MovieWriters` (`writer_id`, `writer_name`) VALUES (NULL, ?)", "s", $writer);
                    $writer_id = $this->Database->GetLastInsertedId();
                    $this->Database->Query("INSERT INTO `MovieWritersRelations` (`writer_relation_id`, `writer_id`, `movie_id`, `is_director`) VALUES (NULL, ?, ?, 0)", "ss", $writer_id, $this->Id);
                }
            }
        }
    }
    public function GetStars(){
        $stars = [];

        $starResult = $this->Database->Query("SELECT `star_id` FROM `MovieStarsRelations` WHERE `movie_id` = ?", "s", $this->Id);
        while($starData = $starResult->fetch_assoc()){
            $Star = new Star($this->Database);
            $Star->Get($starData["star_id"]);
            array_push($stars, $Star);
        }

        return $stars;
    }

    public function Delete(){
        $DeleteResult = $this->Database->Query("DELETE FROM `Moives` WHERE `movie_id` = ?", "s", $this->Id);
        return true;
    }

    public function Edit(){
        $EditReult = $this->Database->Query("UPDATE `Moives` SET `movie_title` = ?, `movie_lenght` = ?, `movie_age_rating` = ?, `movie_description` = ?, `movie_release` = ?, `movie_trailer` = ?, `movie_rating` = ? WHERE `movie_id` = ?", "ssssssss", $this->Title, $this->Lenght, $this->AgeRating, $this->Description, $this->Release, $this->TrailerLink, $this->Rating, $this->Id);
        return true;
        
    }

    public function Create(){

    }

    public function Get($id){
        $getResult = $this->Database->Query("SELECT * FROM `Moives` WHERE `movie_id` = ?", "s", $id);
        if($getResult->num_rows == 0)
            throw new Exception("Movie does not exist");
        
        $getData = $getResult->fetch_assoc();
        $this->Id = $getData["movie_id"];
        $this->Title = $getData["movie_title"];
        $this->Length = $getData["movie_lenght"];
        $this->AgeRating = $getData["movie_age_rating"];
        $this->Description = $getData["movie_description"];
        $this->ReleaseDate = $getData["movie_release"];
        $this->Rating = $getData["movie_rating"];
        $this->TrailerLink = $getData["movie_trailer"];

        return true;
    }
}