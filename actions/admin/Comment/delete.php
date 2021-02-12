<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $comment=new Comment($Database);
    $comment->Get($_GET["id"]);
    $comment->Delete();
}
header("Location: $_SERVER[HTTP_REFERER]");