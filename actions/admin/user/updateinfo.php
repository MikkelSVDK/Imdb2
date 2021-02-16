<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User != null && $User->IsAdmin()){
    $currentUser = new User($Database);
    $currentUser->Get($_POST["id"]);

    $currentUser->Email = $_POST["email"];
    $currentUser->Firstname = $_POST["firstname"];
    $currentUser->Lastname = $_POST["lastname"];
    $currentUser->Phone = $_POST["phone"];

    $currentUser->Edit();
}
header("Location: $_SERVER[HTTP_REFERER]");