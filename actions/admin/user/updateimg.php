<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User != null && $User->IsAdmin()){
    $currentUser = new User($Database);
    $currentUser->Get($_POST["id"]);

    $currentUser->SetImage($_FILES["img"]);
}
header("Location: $_SERVER[HTTP_REFERER]");