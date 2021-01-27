<?php require("includes/core.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Find alle dine favorit film | IMDB2</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/custom.css">
    </head>
    <body>
<?php include("includes/navbar.php"); ?>
        <div class="container">
            <h3>Login</h3>
            <br>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Imdb2@Imdb2.dk">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Din kode</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="****">
            </div>
        </div>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>