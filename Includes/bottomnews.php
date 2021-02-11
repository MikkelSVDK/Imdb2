            <hr style="border-top: 1px dashed #3e3f3a;">
            <div class="row">
                <div class="col-lg-6">
                    <h4>NEWS <span class="float-right"><a href="/news.php">See all</a></span></h4>
<?php
$newsResult = $Database->Query("SELECT * FROM `News` ORDER BY `news_date` DESC LIMIT 3");
while($newsData = $newsResult->fetch_assoc()){
  $News = new News($Database);
  $News->Get($newsData["news_id"]);
?>
                    <div class="news">
                        <small><?= date("d.m.Y", strtotime($News->Date)) ?></small>
                        <h5><?= $News->Title ?></h5>
                        <p><?= $News->Description ?></p>
                    </div>
<?php 
}
?>
                </div>
                <div class="col-lg-6">
                    <h4>COMMING SOON <span class="float-right"><a href="/movies.php?sort=commingsoon">See all</a></span></h4>
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