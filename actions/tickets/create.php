<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");

    $Tickets = new Ticket($Database);
    $Tickets->Fullname = $_POST["Name"];
    $Tickets->Email = $_POST["Email"];
    $Tickets->Message = $_POST["Text"];
    $Tickets->Create();

header("Location: $_SERVER[HTTP_REFERER]");