<div class="container">
<?php
$ticketResult = $Database->Query("SELECT `ticket_id` FROM `Tickets` ");
while($ticketData = $ticketResult->fetch_assoc()){
    $Ticket = new Ticket($Database);
    $Ticket->Get($ticketData["ticket_id"]);
?>
        <div class="row">
        <div class="col-8">
            <h5><?= $Ticket->Fullname ?></h5><p><?= $Ticket->Email ?><br><b><?= $Ticket->Message ?></b>
        </div>
        <div class="col-4">
            <center>
                <a href="/actions/admin/tickets/delete.php?id=<?=$Ticket->Id?>" class="btn btn-primary" Style="background-color:Red;margin-bottom:5px">Remove</a>
                <a href="/admin.php?action=editticket&id=<?=$Ticket->Id?>" class="btn btn-primary" Style="background-color:Green">Edit</a>
            </center>
        </div>
    </div>
    <hr>
<?php 
    } 
?>
</div>