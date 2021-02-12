<?php 
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

if($User != null){
    if(!empty($_POST["password"]) && $_POST["password"] == $_POST["repeatpassword"]){
        $User->UpdatePassword($_POST["password"]);
    }
}

header("Location: $_SERVER[HTTP_REFERER]");