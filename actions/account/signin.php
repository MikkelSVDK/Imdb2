<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

$userResult = $Database->Query("SELECT `user_id`, `user_password` FROM `Users` WHERE `user_email` = ?", "s", $_POST["email"]);
if($userResult->num_rows > 0){
    $userData = $userResult->fetch_assoc();
    if(password_verify($_POST["password"], $userData["user_password"])){
        $_SESSION["uid"] = $userData["user_id"];

        header("Location: /profile.php");
        die();
    }else
        setcookie("signin_error", "Forkert kode eller email", time() + 1);
}else
    setcookie("signin_error", "Forkert kode eller email", time() + 1);

header("Location: $_SERVER[HTTP_REFERER]");