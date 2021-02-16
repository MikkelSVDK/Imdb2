<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $news = new News($Database);
    $news->Title = $_POST["Title"];
    $news->Description = $_POST["Description"];

    $news->Create($User->Id);
    
    
}
header("Location: /admin.php?action=editnews&id=".$news->Id);