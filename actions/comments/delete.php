<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

if($User != null) {
    $Comment = new Comment($Database);
    $Comment->Get($_GET["id"]);

    $commentUser = $Comment->GetUser();
    if($User->Id == $commentUser->Id || $User->IsAdmin()){
        $Comment->Delete();
    }
}

header("Location: $_SERVER[HTTP_REFERER]");