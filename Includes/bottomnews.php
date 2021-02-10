            <hr style="border-top: 1px dashed #3e3f3a;">
            <div class="row">
                <div class="col-lg-6">
                    <h4>NEWS <span class="float-right"><a href="">See all</a></span></h4>
                    <div class="news">
                        <small>11.09.18</small>
                        <h5>Title</h5>
                        <p>Meget tekst</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>COMMING SOON <span class="float-right"><a href="">See all</a></span></h4>
<?php
$movieResult = $Database->Query("SELECT `movie_id` FROM `Moives` WHERE `movie_release` > CURRENT_TIMESTAMP ORDER BY `movie_release` ASC LIMIT 3");
while($movieData = $movieResult->fetch_assoc()){
  $Movie = new Movie($Database);
  $Movie->Get($movieData["movie_id"]);
?>
                    <div class="news">
                        <a href="/movie.php?id=<?= $Movie->Id ?>">
                            <div class="row">
                                <div class="col-3">
                                    <img class="img-fluid" src="<?= $Movie->GetImage() ?>">
                                </div>
                                <div class="col-9">
                                    <small><?= date("d.m.Y", strtotime($Movie->ReleaseDate)) ?></small>
                                    <h5><?= $Movie->Title ?></h5>
                                    <p><?= $Movie->Description ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
<?php 
}
?>
                </div>
            </div>