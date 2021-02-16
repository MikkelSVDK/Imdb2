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
        <div class = "container">
            <h4>Nyheder</h4>
<?php
$newsResult = $Database->Query("SELECT * FROM `News` ORDER BY `news_date` DESC LIMIT 3");
while($newsData = $newsResult->fetch_assoc()){
  $News = new News($Database);
  $News->Get($newsData["news_id"]);

  $NewsUser = $News->GetUser();
?>
            <div class="news">
                <a href="shownews.php?id=<?= $News->Id ?>">
                    <b><?= date("d-m-Y", strtotime($News->Date)) ?></b>
                    <h5><?= $News->Title ?></h5>
                    <p><small><?= $NewsUser->Firstname." ".$NewsUser->Lastname ?></small></p>
                    <p><?= nl2br($News->Description) ?></p>
                </a> 
            </div>
<?php 
}
?>
        </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>