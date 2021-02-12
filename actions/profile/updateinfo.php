<?php 
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

if($User != null){
    $User->Email = $_POST["email"];
    $User->Firstname = $_POST["firstname"];
    $User->Lastname = $_POST["lastname"];
    $User->Phone = $_POST["phone"];
    $User->Edit();
}

header("Location: $_SERVER[HTTP_REFERER]");