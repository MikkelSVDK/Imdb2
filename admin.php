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
            <?php
            $commentResult = $Database->Query("SELECT `Comments`.`comment_id` FROM `Comments`");
                while($CommentData = $commentResult->fetch_assoc()){
                    $Comment = new Comment($Database);
                    $Comment->Get($CommentData["comment_id"]);
            ?>
                <div class="col-lg-6">
                    <div class="comment-overlay">
                        <div class="btn-group-vertical">
                            <a href="/actions/admin/Comment/delete.php?id=<?=$Comment->Id?>" class="btn btn-primary" Style="background-color:Red">Remove</a>
                            <button type="button" class="btn btn-primary" Style="background-color:Green">Edit</button>
                        </div>
                    </div>
                    <a><?= $Comment->Text." ".$Comment->GetUser()->Firstname." ".$Comment->Date ?>
                    <hr />
                </div>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-4">
            <?php
                $userResult = $Database->Query("SELECT `Users`.`user_id` FROM `Users`");
                while($userData = $userResult->fetch_assoc()){
                    $User = new User($Database);
                    $User->Get($userData["user_id"]);
            ?>
                <div class="col-lg-12">
                    <div class="user-overlay">
                        <div class="btn-group-vertical">
                            <a href="/actions/admin/user/delete.php?id=<?=$User->Id?>" class="btn btn-primary" Style="background-color:Red">Remove</a>
                            <button type="button" class="btn btn-primary" Style="background-color:Green">Edit</button>
                        </div>
                    </div>
                    <a><?= $User->Firstname." ".$User->Lastname ?>
                    <hr />
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>