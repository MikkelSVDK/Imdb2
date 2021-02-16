<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $news=new News($Database);
    $news->Get($_GET["id"]);
    $news->Delete();
}
header("Location: $_SERVER[HTTP_REFERER]");