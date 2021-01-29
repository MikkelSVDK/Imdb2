<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

if(!isset($_SESSION["uid"])){
    if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["telephonenumber"]) && !empty($_POST["password"]) && !empty($_POST["repeatpassword"]) && !empty($_POST["road"]) && !empty($_POST["city"]) && !empty($_POST["country"])){
        if($_POST["password"] == $_POST["repeatpassword"]){
            $NewUser = new User($Database);
            $NewUser->Firstname = $_POST["firstname"];
            $NewUser->Lastname = $_POST["lastname"];
            $NewUser->Email = $_POST["email"];
            $NewUser->Phone = $_POST["telephonenumber"];

            if($NewUser->Create($_POST["password"], $_POST["road"], $_POST["city"], $_POST["country"])){
                $_SESSION["uid"] = $NewUser->Id;

                header("Location: /profile.php");
                die();
            }else
            setcookie("signup_error", "Kunne ikke oprette kontoen", time() + 1);
        }else
            setcookie("signup_error", "Adgangskoderne matcher ikke", time() + 1);
    }else
        setcookie("signup_error", "Udfyld alle felter og prøv igen", time() + 1);
}

header("Location: $_SERVER[HTTP_REFERER]");