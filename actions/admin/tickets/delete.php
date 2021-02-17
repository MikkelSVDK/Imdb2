<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
if($User!=null and $User->IsAdmin()){
    
    $ticket=new Ticket($Database);
    $ticket->Get($_GET["id"]);
    $ticket->Delete();
}
header("Location: $_SERVER[HTTP_REFERER]");