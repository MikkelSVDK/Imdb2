<?php require("includes/core.php"); 
if($User==null or !$User->IsAdmin()){
    header("location: /");
    die();
} ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Find alle dine favorit film | IMDB2</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/custom.css">
        <link rel="stylesheet" href="https://mcskri.pt/css/sticky-footer.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    </head>
    <body>
<?php include("includes/navbar.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <?php
                $movieResult = $Database->Query("SELECT `Moives`.`movie_id` FROM `Moives`");
                while($movieData = $movieResult->fetch_assoc()){
                $Movie = new Movie($Database);
                $Movie->Get($movieData["movie_id"]);
            ?>
                <div class="col-lg-6">
                    <div class="movie-overlay">
                    <div class="btn-group-vertical">
                        <a href="/actions/admin/movies/delete.php?id=<?=$Movie->Id?>" class="btn btn-primary" Style="background-color:Red">Remove</a>
                        <button type="button" class="btn btn-primary" Style="background-color:Green">Edit</button>
                    </div>
                    </div>
                    <img class="movie-img img-fluid" src="<?= $Movie->GetImage() ?>">
                </div>
<?php
}
?>
            </div>
            <div class="col-lg-4">
            Comments
            </div>
            <div class="col-lg-4">
            User
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>