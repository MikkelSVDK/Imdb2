<?php require("includes/core.php"); ?>
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
            <h4>Latest trailers <span class="float-right"><a href="">See all</a></span></h4>
            <div class="row">
<?php
$movieResult = $Database->Query("SELECT `movie_id` FROM `Moives` ORDER BY `Moives`.`movie_release` DESC LIMIT 6");
while($movieData = $movieResult->fetch_assoc()){
  $Movie = new Movie($Database);
  $Movie->Get($movieData["movie_id"]);
?>
                <div class="col-lg-2">
                    <div class="movie-overlay">
                        <a href="/movie.php?id=<?= $Movie->Id ?>">
                            <i class="far fa-play-circle"></i><br>
                            <div class="play">Play trailer</div>
                            <div class="title"><?= $Movie->Title ?></div>
                        </a>
                    </div>
                    <img class="movie-img img-fluid" src="<?= $Movie->GetImage() ?>">
                    <span class="float-right"><i class="fas fa-comment-alt movie-comment"></i><b class="movie-comment-number"><?= count($Movie->GetComments()) ?></b></span>
                </div>
<?php
}
?>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <h4>Most commented <span class="float-right"><a href="">See all</a></span></h4>
                </div>
                <?php
$movieResult = $Database->Query("SELECT `Moives`.`movie_id`, `Comments`.`comments` FROM `Moives` LEFT OUTER JOIN (SELECT `movie_id`, count(`comment_id`) AS `comments` FROM `Comments` GROUP BY `movie_id`) AS `Comments` ON `Comments`.`movie_id` = `Moives`.`movie_id` ORDER BY `Comments`.`comments` DESC LIMIT 6");
while($movieData = $movieResult->fetch_assoc()){
  $Movie = new Movie($Database);
  $Movie->Get($movieData["movie_id"]);
?>
                <div class="col-lg-2">
                    <div class="movie-overlay">
                        <a href="/movie.php?id=<?= $Movie->Id ?>">
                            <i class="far fa-play-circle"></i><br>
                            <div class="play">Play trailer</div>
                            <div class="title"><?= $Movie->Title ?></div>
                        </a>
                    </div>
                    <img class="movie-img img-fluid" src="<?= $Movie->GetImage() ?>">
                    <span class="float-right"><i class="fas fa-comment-alt movie-comment"></i><b class="movie-comment-number"><?= count($Movie->GetComments()) ?></b></span>
                </div>
<?php
}
?>
            </div>
<?php include("includes/bottomnews.php"); ?> 
        </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>