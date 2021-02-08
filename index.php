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
            <h4>Latest trailers <span class="float-right"><a href="">See all</a></span></h4>
            <div class="row">
                <div class="col-lg-2">
                    <div class="movie-overlay">
                        <a href="">
                            <i class="far fa-play-circle"></i><br>
                            <div class="play">Play trailer</div>
                            <div class="title">Spider-Man</div>
                        </a>
                    </div>
                    <img class="movie-img img-fluid" src="https://m.media-amazon.com/images/M/MV5BZDEyN2NhMjgtMjdhNi00MmNlLWE5YTgtZGE4MzNjMTRlMGEwXkEyXkFqcGdeQXVyNDUyOTg3Njg@._V1_UX182_CR0,0,182,268_AL_.jpg">
                    <span class="float-right"><i class="fas fa-comment-alt movie-comment"></i><b class="movie-comment-number">9</b></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <h4>Most commented <span class="float-right"><a href="">See all</a></span></h4>
                </div>
                <div class="col-lg-2">
                    <div class="movie-overlay">
                        <a href="">
                            <i class="far fa-play-circle"></i><br>
                            <div class="play">Play trailer</div>
                            <div class="title">Spider-Man</div>
                        </a>
                    </div>
                    <img class="img-fluid" src="https://m.media-amazon.com/images/M/MV5BZDEyN2NhMjgtMjdhNi00MmNlLWE5YTgtZGE4MzNjMTRlMGEwXkEyXkFqcGdeQXVyNDUyOTg3Njg@._V1_UX182_CR0,0,182,268_AL_.jpg">
                    <span class="float-right"><i class="fas fa-comment-alt movie-comment"></i><b class="movie-comment-number">9</b></span>
                </div>
            </div>
<?php include("includes/bottomnews.php"); ?> 
        </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>