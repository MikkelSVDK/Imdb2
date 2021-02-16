<?php
require("includes/core.php");

$news = new News($Database);
$news->Get($_GET["id"]);
$newsUser = $news->GetUser();
?>
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
        <div class = "container">
            <h4><?= $news->Title ?></h4>
            <b><?= date("d-m-Y", strtotime($news->Date)) ?></b>
            <p><small>Written by <?= $newsUser->Firstname." ".$newsUser->Lastname ?></small></p>
            <p><?= nl2br($news->Description) ?></p>
            <a href="news.php">Gå tilbage</a> 
        </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>