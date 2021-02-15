<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $movie = new Movie($Database);
    $movie->Title = $_POST["Title"];
    $movie->Length = $_POST["Lenght"];
    $movie->AgeRating = $_POST["AgeRating"];
    $movie->Description = $_POST["Description"];
    $movie->ReleaseDate = $_POST["Release"];
    $movie->TrailerLink = $_POST["TrailerLink"];
    $movie->Rating = $_POST["Rating"];
    $movie->Create();

    $movie->SetImage($_FILES["PostingImg"]);
    $movie->SetDirectors(explode(",", $_POST["Director"]));
    $movie->SetWriters(explode(",", $_POST["Writer"]));
    $movie->SetStars(explode(",", $_POST["Stars"]));
    $movie->SetGenres(explode(",", $_POST["Genres"]));
    
    
}
header("Location: /admin.php?action=editmovie&id=".$movie->Id);