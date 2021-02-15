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
        $currentDirectors = $this->GetDirectors();

        foreach($directorArray as $director){
            unset($currentDirectors[$director]);

            $writersRelationsResult=$this->Database->Query("SELECT * FROM `MovieWritersRelations` JOIN `MovieWriters` ON `MovieWriters`.`writer_id` = `MovieWritersRelations`.`writer_id` WHERE `MovieWriters`.`writer_name` = ? AND `MovieWritersRelations`.`movie_id` = ? AND `MovieWritersRelations`.`is_director` = 1", "ss", $director, $this->Id);
            if($writersRelationsResult->num_rows >! 0) {
                $writersResult = $this->Database->Query("SELECT * FROM `MovieWriters` WHERE `writer_name` = ?", "s", $director);
                if($writersResult->num_rows > 0) {
                    $writerData = $writersResult->fetch_assoc();
                    $this->Database->Query("INSERT INTO `MovieWritersRelations` (`writer_relation_id`, `writer_id`, `movie_id`, `is_director`) VALUES (NULL, ?, ?, 1)", "ss", $writersData["writer_id"], $this->Id);
                } else {
                    $this->Database->Query("INSERT INTO `MovieWriters` (`writer_id`, `writer_name`) VALUES (NULL, ?)", "s", $director);
                    $writer_id = $this->Database->GetLastInsertedId();
                    $this->Database->Query("INSERT INTO `MovieWritersRelations` (`writer_relation_id`, `writer_id`, `movie_id`, `is_director`) VALUES (NULL, ?, ?, 1)", "ss", $writer_id, $this->Id);
                }
            }
        }

        foreach($currentDirectors as $director){
            $this->Database->Query("DELETE FROM `MovieWritersRelations` JOIN `MovieWriters` ON `MovieWriters`.`writer_id` = `MovieWritersRelations`.`writer_id` WHERE `MovieWriters`.`writer_name` = ? AND `MovieWritersRelations`.`movie_id` = ? AND `MovieWritersRelations`.`is_director` = 1", "ss", $director, $this->Id);
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
        $currentWriters = $this->GetWriters();

        foreach($writerArray as $writer){
            unset($currentWriters[$writer]);

            $writersRelationsResult=$this->Database->Query("SELECT * FROM `MovieWritersRelations` JOIN `MovieWriters` ON `MovieWriters`.`writer_id` = `MovieWritersRelations`.`writer_id` WHERE `MovieWriters`.`writer_name` = ? AND `MovieWritersRelations`.`movie_id` = ? AND `MovieWritersRelations`.`is_director` = 0", "ss", $writer, $this->Id);
            if($writersRelationsResult->num_rows >! 0) {
                $writersResult = $this->Database->Query("SELECT * FROM `MovieWriters` WHERE `writer_name` = ?", "s", $writer);
                if($writersResult->num_rows > 0) {
                    $writerData = $writersResult->fetch_assoc();
                    $this->Database->Query("INSERT INTO `MovieWritersRelations` (`writer_relation_id`, `writer_id`, `movie_id`, `is_director`) VALUES (NULL, ?, ?, 0)", "ss", $writersData["writer_id"], $this->Id);
                } else {
                    $this->Database->Query("INSERT INTO `MovieWriters` (`writer_id`, `writer_name`) VALUES (NULL, ?)", "s", $writer);
                    $writer_id = $this->Database->GetLastInsertedId();
                    $this->Database->Query("INSERT INTO `MovieWritersRelations` (`writer_relation_id`, `writer_id`, `movie_id`, `is_director`) VALUES (NULL, ?, ?, 0)", "ss", $writer_id, $this->Id);
                }
            }
        }

        foreach($currentWriters as $writer){
            $this->Database->Query("DELETE FROM `MovieWritersRelations` JOIN `MovieWriters` ON `MovieWriters`.`writer_id` = `MovieWritersRelations`.`writer_id` WHERE `MovieWriters`.`writer_name` = ? AND `MovieWritersRelations`.`movie_id` = ? AND `MovieWritersRelations`.`is_director` = 0", "ss", $writer, $this->Id);
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

    public function SetStars($starArray){
        $currentStars = $this->GetStars();

        foreach($starArray as $star){
            unset($currentStars[$star]);

            $starsRelationsResult = $this->Database->Query("SELECT * FROM `MovieStarsRelations` JOIN `MovieStars` ON `MovieStars`.`star_id` = `MovieStarsRelations`.`star_id` WHERE `MovieStars`.`star_name` = ? AND `MovieStarsRelations`.`movie_id` = ?", "ss", $star, $this->Id);
            if($starsRelationsResult->num_rows >! 0) {
                $starsResult = $this->Database->Query("SELECT * FROM `MovieStars` WHERE `star_name` = ?", "s", $star);
                if($starsResult->num_rows > 0) {
                    $starData = $starsResult->fetch_assoc();
                    $this->Database->Query("INSERT INTO `MovieStarsRelations` (`star_relation_id`, `star_id`, `movie_id`) VALUES (NULL, ?, ?)", "ss", $starData["star_id"], $this->Id);
                } else {
                    $this->Database->Query("INSERT INTO `MovieStars` (`star_id`, `star_name`) VALUES (NULL, ?)", "s", $star);
                    $star_id = $this->Database->GetLastInsertedId();
                    $this->Database->Query("INSERT INTO `MovieStarsRelations` (`star_relation_id`, `star_id`, `movie_id`) VALUES (NULL, ?, ?)", "ss", $star_id, $this->Id);
                }
            }
        }

        foreach($currentStars as $star){
            $this->Database->Query("DELETE FROM `MovieStarsRelations` JOIN `MovieStars` ON `MovieStars`.`star_id` = `MovieStarsRelations`.`star_id` WHERE `MovieStars`.`star_name` = ? AND `MovieStarsRelations`.`movie_id` = ?", "ss", $star, $this->Id);
        }
    }

    public function Delete(){
        $DeleteResult = $this->Database->Query("DELETE FROM `Moives` WHERE `movie_id` = ?", "s", $this->Id);
        return true;
    }

    public function Edit(){
        $EditReult = $this->Database->Query("UPDATE `Moives` SET `movie_title` = ?, `movie_lenght` = ?, `movie_age_rating` = ?, `movie_description` = ?, `movie_release` = ?, `movie_trailer` = ?, `movie_rating` = ? WHERE `movie_id` = ?", "ssssssss", $this->Title, $this->Length, $this->AgeRating, $this->Description, $this->ReleaseDate, $this->TrailerLink, $this->Rating, $this->Id);
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