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
            <div class="row">
<?php
$i = 0;

if(empty($_GET["search"])){
    if(empty($_GET["sort"]))
        $query = "SELECT `movie_id` FROM `Moives`";
    else if($_GET["sort"] == "latest")
        $query = "SELECT `movie_id` FROM `Moives` ORDER BY `movie_release` DESC";
    else if($_GET["sort"] == "mostcommented")
        $query = "SELECT `Moives`.`movie_id`, `Comments`.`comments` FROM `Moives` LEFT OUTER JOIN (SELECT `movie_id`, count(`comment_id`) AS `comments` FROM `Comments` GROUP BY `movie_id`) AS `Comments` ON `Comments`.`movie_id` = `Moives`.`movie_id` ORDER BY `Comments`.`comments` DESC";
    $movieResult = $Database->Query($query);
}else{
    $search = "%".implode("%", str_split($_GET["search"]))."%";
    $movieResult = $Database->Query("SELECT `movie_id` FROM `Moives` WHERE `movie_title` LIKE ?", "s", $search);
}

while($movieData = $movieResult->fetch_assoc()){
  $i++;
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
                    <center><img class="movie-img img-fluid" src="<?= $Movie->GetImage() ?>"></center>
                    <span class="float-right"><i class="fas fa-comment-alt movie-comment"></i><b class="movie-comment-number"><?= count($Movie->GetComments()) ?></b></span>
                </div>
<?php if($i == 6){ $i = 0; ?> 
            </div>
            <br>
            <div class="row">
<?php
  }
}
?>
            </div>
        </div>

<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>