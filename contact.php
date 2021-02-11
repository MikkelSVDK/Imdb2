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
            <h2>Kontakt ImbD2</h2>
            <br>
            <form method="post" action="/actions/tickets/create.php">

                <div class="form-group">
                    <input type="name" class="form-control" name="Name" aria-describedby="nameHelp" placeholder="Skriv fulde navn">
                </div>
                            
                <div class="form-group">
                    <input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="Skriv email">
                </div>
                
                <div class="form-group">
                    <textarea class="form-control" name="Text" rows="4" placeholder="Hvad har du brug for hjælp til?"></textarea>
                </div>

                <div class="btn-group-vertical">
                    <button type="submit" name="SubmitButton" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
<?php include("includes/footer.php"); ?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>