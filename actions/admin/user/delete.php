<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $user=new User($Database);
    $user->Get($_GET["id"]);
    $user->Delete();
}
header("Location: $_SERVER[HTTP_REFERER]");