<?php
class Movie {
    public int $Id = null;
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
        $imageResult = $this->Database->Query("SELECT ? AS `image`", "s", $this->Id);
        if($imageResult->num_rows == 0)
            throw new Exception("User does not have an image");
        
        $imageData = $imageResult->fetch_assoc();
        return $imageData["image"];
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
}