<?php
require("includes/core.php");
$Movie = new Movie($Database);
$Movie->Get($_GET["id"]);
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
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h4><?= $Movie->Title ?></h4>
                </div>
                <div class="col-lg-3">
                    <span class="float-right">Comments: <?= count($Movie->GetComments()) ?></span>
                </div>
                <div class="col-lg-3">
                    <b>
                        Age Rating: <b style="color:#ff527f"><?= $Movie->AgeRating ?></b> 
                    </b>
                </div>
                <div class="col-lg-3">
                    <b>
                        Duration: <b style="color:#ff527f"><?= gmdate("H\h i\m", $Movie->Length) ?></b> 
                    </b>
                </div>
                <div class="col-lg-3">
                    <b>
                        Genre: <b style="color:#ff527f"><?= implode(", ", array_map(function($d){ return $d->Name; }, $Movie->GetGenres() ?: [])) ?></b> 
                    </b>
                </div>
                <div class="col-lg-3">
                    <b>
                        Relase Date: <b style="color:#ff527f"><?= date("d. M Y", strtotime($Movie->ReleaseDate)) ?></b> 
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <img class="img-fluid" src="<?= $Movie->GetImage() ?>" alt="">
                </div>
                <div class="col-lg-9">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?= $Movie->TrailerLink ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <b>
                        Director: <b style="color:#ff527f"><?= implode(", ", array_map(function($d){ return $d->Name; }, $Movie->GetDirectors() ?: [])) ?></b> 
                    </b>
                </div>
                <div class="col-lg-4">
                    <b>
                        Writer: <b style="color:#ff527f"><?= implode(", ", array_map(function($d){ return $d->Name; }, $Movie->GetWriters() ?: [])) ?></b> 
                    </b>
                </div>
                <div class="col-lg-4">
                    <b>
                        Stars: <b style="color:#ff527f"><?= implode(", ", array_map(function($d){ return $d->Name; }, $Movie->GetStars() ?: [])) ?></b> 
                    </b>
                </div>
            </div>
            <br>
            <h3><b>Description</b></h3>
            <p><?= $Movie->Description ?></p>
            <h5><b>Post a comment</b></h5>
<?php if($User != null) { ?>
                <div class="form-group">
                    <form action="/actions/comments/create.php" method="POST">
                        <input type="hidden" name="movie_id" value="<?= $Movie->Id ?>">
                        <textarea name="comment" class="form-control" placeholder="Write you comment here" rows="3"></textarea>
                        <input type="submit" value="Send comment">
                    </form>
                </div>
<?php } else { ?>
                <div class="form-group">    
                    <textarea class="form-control" placeholder="You can't write a comment. You need to login first" rows="3" disabled></textarea>
                </div>
<?php } ?>
            <hr>
<?php
foreach($Movie->GetComments() as $comment){
    $commentUser = $comment->GetUser();
?>
            <blockquote class="blockquote">
                <header class="blockquote-footer"><?= $commentUser->Firstname." ".$commentUser->Lastname ?> <cite title="Source Title"><?= date("d-m-Y", strtotime($comment->Date)) ?></cite></header>
                <p class="mb-0"><?= $comment->Text ?></p>
<?php if(($User != null && $User->IsAdmin()) || ($User != null && $commentUser->Id == $User->Id)){ ?>
                <br>
                <footer class="blockquote-footer"><a href="/actions/comments/delete.php?id=<?= $comment->Id ?>">DELETE</a></footer>
<?php } ?>
            </blockquote>
<?php 
}
?>
        </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>