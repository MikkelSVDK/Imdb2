<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $news = new News($Database);
    $news->Get($_POST["id"]);
    $news->Title = $_POST["Title"];
    $news->Description = $_POST["Description"];

    $news->Edit();
    
    
}
header("Location: /admin.php?action=editnews&id=".$news->Id);