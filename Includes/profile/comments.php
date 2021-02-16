    <div class="container">
<?php
$commentResult = $Database->Query("SELECT `comment_id` FROM `Comments` WHERE `user_id` = ?", "s", $User->Id);
while($commentData = $commentResult->fetch_assoc()){
  $Comment = new Comment($Database);
  $Comment->Get($commentData["comment_id"]);
  $commentUser = $Comment->GetUser();
  $commentMovie = $Comment->GetMovie();
?>
        <div class="row">
            <div class="col-lg-1">
                <a href="/movie.php?id=<?= $commentMovie->Id ?>" class="text-decoration-none" style="color:unset;">
                    <img src="<?= $commentMovie->GetImage() ?>" class="img-fluid">
                </a>
            </div>
            <div class="col-lg-11">
                <blockquote class="blockquote">
                    <header class="blockquote-footer"><?= $commentUser->Firstname." ".$commentUser->Lastname ?> <cite title="Source Title"><?= date("d-m-Y", strtotime($Comment->Date)) ?></cite></header>
                    <p class="mb-0"><?= $Comment->Text ?></p>
                    <br>
                    <footer class="blockquote-footer"><a href="/actions/comments/delete.php?id=<?= $Comment->Id ?>">DELETE</a></footer>
                </blockquote>
            </div>
        </div>
<?php
}
?>
    </div>