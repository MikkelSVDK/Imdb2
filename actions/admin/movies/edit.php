<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $movie=new Movie($Database);
    $movie->Get($_POST["id"]);
    $movie->Title = $_POST["Title"];
    $movie->Length = $_POST["Lenght"];
    $movie->AgeRating = $_POST["AgeRating"];
    $movie->Description = $_POST["Description"];
    $movie->ReleaseDate = $_POST["Release"];
    /*
    $movie->GetImage() = $_POST["PostingImg"];
    */
    $movie->TrailerLink = $_POST["TrailerLink"];
    $movie->Rating = $_POST["Rating"];
    $movie->SetDirectors(explode(",", $_POST["Director"]));
    $movie->SetWriters(explode(",", $_POST["Writer"]));
    $movie->SetStars(explode(",", $_POST["Stars"]));
    $movie->SetGenres(explode(",", $_POST["Genres"]));
    $movie->Edit();
    
    
}
header("Location: $_SERVER[HTTP_REFERER]");