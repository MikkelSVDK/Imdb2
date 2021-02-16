<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

if($User != null){
    $currentUser->SetImage($_FILES["img"]);
}
header("Location: $_SERVER[HTTP_REFERER]");