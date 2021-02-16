    <div class="container">
<?php
$commentResult = $Database->Query("SELECT `comment_id` FROM `Comments` WHERE `user_id` = ?", "s", $User->Id);
while($commentData = $commentResult->fetch_assoc()){
  $Comment = new Comment($Database);
  $Comment->Get($commentData["comment_id"]);
  $commentUser = $Comment->GetUser();
?>
        <div class="row">
            <div class="col-lg-1">
                <img src="<?= $Comment->GetMovie()->GetImage() ?>" class="img-fluid">
            </div>
            <div class="col-lg-11">
                <blockquote class="blockquote">
                    <footer class="blockquote-footer"><?= $commentUser->Firstname." ".$commentUser->Lastname ?> <cite title="Source Title"><?= date("d-m-Y", strtotime($Comment->Date)) ?></cite></footer>
                    <p class="mb-0"><?= $Comment->Text ?></p>
                </blockquote>
            </div>
        </div>
<?php
}
?>
    </div>