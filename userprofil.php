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
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fst.depositphotos.com%2F2218212%2F2938%2Fi%2F950%2Fdepositphotos_29387653-stock-photo-facebook-profile.jpg&f=1&nofb=1" alt="">
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="staticEmail" value="Bing@Gmail.com">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Fornavn</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="staticFornavn" value="Fornavn">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Efternavn</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="staticEfternavn" value="Efternavn">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Telefon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="staticEfternavn" value="27272727">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control-plaintext" id="staticKode" placeholder="Ændrekode">
                        </div>
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-primary">Button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>