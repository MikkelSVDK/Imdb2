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
            <h4>Batman The Dark Knight</h4>
            <div class="row">
                <div class="col-lg-3">
                    <b>
                        Age Rating: <b style="color:#ff527f">Old Enough</b> 
                    </b>
                </div>
                <div class="col-lg-3">
                    <b>
                        Duration: <b style="color:#ff527f">To Short</b> 
                    </b>
                </div>
                <div class="col-lg-3">
                    <b>
                        Genre: <b style="color:#ff527f">Krime, Violence, Batman</b> 
                    </b>
                </div>
                <div class="col-lg-3">
                    <b>
                        Relase Date: <b style="color:#ff527f">A day</b> 
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2F4.bp.blogspot.com%2F_3N0VetpYvQE%2FSwxqEAu9_HI%2FAAAAAAAAATo%2Fs6D3g8096AQ%2Fs1600%2FBatman_The_Dark_Knight_23.jpg&f=1&nofb=1" alt="">
                </div>
                <div class="col-lg-9">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/EXeTwQWrcwY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <b>
                        Director: <b style="color:#ff527f">Some Old Guy</b> 
                    </b>
                </div>
                <div class="col-lg-4">
                    <b>
                        Writer: <b style="color:#ff527f">Astrid Lindgren</b> 
                    </b>
                </div>
                <div class="col-lg-4">
                    <b>
                        Stars: <b style="color:#ff527f">Hugh Hefner</b> 
                    </b>
                </div>
            </div>
            <p>When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice. </p>
            <h3><b>Post a comment</b></h3>
            <?php if($User==null) {
                ?>
                <div class="form-group">
                    <form action="/" method="Post">
                        <textarea class="form-control" id="exampleTextarea" placeholder="Write you comment here" rows="3"></textarea>
                        <input type="submit" value="Send comment">
                    </form>
                </div>
                <?php
            }
            else {
                ?>
                <div class="form-group">    
                    <textarea class="form-control" id="exampleTextarea" placeholder="You can't write a comment. You need to login first" rows="3" disabled></textarea>
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