<?php
class Movie {
    public ?int $Id = null;
    public string $Title;
    public int $Length;
    public string $Description;
    public string $ReleaseDate;
    public int $Rating;
    public string $Director;
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

    public function GetTrailerLink(){
        
    }

    public function GetComments(){
        
    }

    public function GetMovieWriters(){
        
    }

    public function Delete(){
        
    }

    public function Edit(){
        
    }

    public function Create(){

    }

    public function Get($id){
        $getResult = $this->Database->Query("SELECT * FROM `Moives` WHERE `movie_id` = ?", "s", $id);
        if($getResult->num_rows == 0)
            throw new Exception("`Movie` does exist");
        
        $getData = $getResult->fetch_assoc();
        $this->Id = $getData["movie_id"];
        $this->Title = $getData["movie_title"];
        $this->Length = $getData["movie_lenght"];
        $this->Description = $getData["movie_description"];
        $this->ReleaseDate = $getData["movie_release"];
        $this->Rating = $getData["movie_rating"];
        $this->Director = $getData["movie_director"];
    }
}