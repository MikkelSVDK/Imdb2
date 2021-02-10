<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

if($User != null) {
    $Comment = new Comment($Database);
    $Comment->Rating = 1;
    $Comment->Text = $_POST["comment"];

    $Comment->Create($User->Id, $_POST["movie_id"]);
}

header("Location: $_SERVER[HTTP_REFERER]");