<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $movie=new Movie($Database);
    $movie->Get($_GET["id"]);
    $movie->Delete();
}
header("Location: $_SERVER[HTTP_REFERER]");