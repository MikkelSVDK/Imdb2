<?php 
require("includes/core.php");

$action = !empty($_GET["action"]) ? $_GET["action"] : "main"; 

if($User==null or !$User->IsAdmin()){
    header("location: /");
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
    include("includes/admin/main.php");
else if($action == "createmovie")
    include("includes/admin/createmovie.php");
else if($action == "editmovie")
    include("includes/admin/editmovie.php");
else if($action == "createnews")
    include("includes/admin/createnews.php");
else if($action == "editnews")
    include("includes/admin/editnews.php");
else if($action == "edituser")
    include("includes/admin/edituser.php");
else if($action == "seetickets")
    include("includes/admin/seetickets.php");
else if($action == "editticket")
    include("includes/admin/editticket.php");

include("includes/footer.php");
?>
    </body>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>