<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $ticket=new Ticket($Database);
    $ticket->Get($_POST["id"]);
    $ticket->Fullname = $_POST["Name"];
    $ticket->Email = $_POST["Email"];
    $ticket->Message = $_POST["Message"];
    $ticket->Edit();
    
}
header("Location: $_SERVER[HTTP_REFERER]");