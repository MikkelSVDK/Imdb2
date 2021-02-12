<?php 
require("includes/core.php");

$action = !empty($_GET["action"]) ? $_GET["action"] : "main"; 

if($User == null){
    header("Location: /");
    die();
}

?>
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
<?php
include("includes/navbar.php"); 

if($action == "main")
  include("includes/profile/main.php");
else if($action == "comments")
  include("includes/profile/comments.php");

include("includes/footer.php");
?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>