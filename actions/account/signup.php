<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["telephonenumber"]) && !empty($_POST["password"]) && !empty($_POST["repeatpassword"]) && !empty($_POST["road"]) && !empty($_POST["city"]) && !empty($_POST["country"])){
    
}else
    setcookie("signup_error", "Udfyld alle felter og prøv igen", time() + 1);

header("Location: $_SERVER[HTTP_REFERER]");