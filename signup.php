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
            <h3>Velkommen til IMDB2</h3>
            <br>
<?php if(isset($_COOKIE["signup_error"])){ ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Ups!</strong> <?= $_COOKIE["signup_error"] ?>
            </div>
<?php } ?>
            <form action="/actions/account/signup.php" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Fornavn</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Fornavn">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Efternavn</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Efternavn">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email adresse</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Imdb2@Imdb2.dk">
                </div>
                <div class="form-group">
                    <label>Telefon nummer</label>
                    <input type="text" name="telephonenumber" class="form-control" placeholder="Telefon Nummer">
                </div>
                <div class="form-group">
                    <label>Din kode</label>
                    <input type="password" name="password" class="form-control" placeholder="****">
                </div>
                <div class="form-group">
                    <label>Gentag kode</label>
                    <input type="password" name="repeatpassword" class="form-control" placeholder="****">
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Vej</label>
                            <input type="text" name="road" class="form-control" placeholder="Vej">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>By</label>
                            <input type="text" name="city" class="form-control" placeholder="By">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Land</label>
                            <input type="text" name="country" class="form-control" placeholder="Land">
                        </div>
                    </div>
                    <div class="btn-group-vertical">
                        <button type="submit" class="btn btn-primary">Opret</button>
                    </div>
                </div>
            </form>
        </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>