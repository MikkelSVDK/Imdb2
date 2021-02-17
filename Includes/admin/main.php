    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <a href="/admin.php?action=createmovie" class="btn btn-primary btn-block" Style="background-color:Green">Opret ny film</a>
            <br>
<?php
$movieResult = $Database->Query("SELECT `Moives`.`movie_id` FROM `Moives`");
while($movieData = $movieResult->fetch_assoc()){
    $Movie = new Movie($Database);
    $Movie->Get($movieData["movie_id"]);
?>
                <div class="row">
                    <div class="col-8">
                    <img class="img-fluid" src="<?= $Movie->GetImage() ?>">
                    </div>
                    <div class="col-4">
                        <center>
                            <a href="/actions/admin/movies/delete.php?id=<?=$Movie->Id?>" class="btn btn-primary" Style="background-color:Red;margin-bottom:5px">Remove</a>
                            <a href="/admin.php?action=editmovie&id=<?=$Movie->Id?>" class="btn btn-primary" Style="background-color:Green">Edit</a>
                        </center>
                    </div>
                </div>
                <hr>
<?php
}
?>
            </div>
            <div class="col-lg-4">
            <a href="/admin.php?action=seetickets" class="btn btn-primary btn-block" Style="background-color:Green">See tickets</a>
            <a href="/admin.php?action=createnews" class="btn btn-primary btn-block" Style="background-color:Green">Opret nyhed</a>
            <br>
<?php
$commentResult = $Database->Query("SELECT `News`.`news_id` FROM `News`");
while($CommentData = $commentResult->fetch_assoc()){
    $News = new News($Database);
    $News->Get($CommentData["news_id"]);
?>
                <div class="row">
                    <div class="col-8">
                        <h5><?= $News->Title ?></h5><p><?= $News->Description ?><br><b><?= $News->GetUser()->Firstname." ".date("d-m-Y", strtotime($News->Date)) ?></b>
                    </div>
                    <div class="col-4">
                        <center>
                            <a href="/actions/admin/news/delete.php?id=<?=$News->Id?>" class="btn btn-primary" Style="background-color:Red;margin-bottom:5px">Remove</a>
                            <a href="/admin.php?action=editnews&id=<?=$News->Id?>" class="btn btn-primary" Style="background-color:Green">Edit</a>
                        </center>
                    </div>
                </div>
                <hr>
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
                <div class="row">
                    <div class="col-8">
                        <?= $User->Firstname." ".$User->Lastname ?>
                    </div>
                    <div class="col-4">
                        <center>
                            <a href="/actions/admin/user/delete.php?id=<?=$User->Id?>" class="btn btn-primary" Style="background-color:Red;margin-bottom:5px">Remove</a>
                            <a href="/admin.php?action=edituser&id=<?=$User->Id?>" class="btn btn-primary" Style="background-color:Green">Edit</a>
                        </center>
                    </div>
                </div>
                <hr>
<?php
}
?>
            </div>
        </div>
    </div>