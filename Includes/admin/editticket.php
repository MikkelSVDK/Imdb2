<?php
    $ticket = new Ticket ($Database);
    $ticket->Get($_GET["id"]);
?>
<div class="container">
    <form name="form" method="post" action="actions/admin/tickets/edit.php">
    <input type="hidden" name="id" value="<?= $ticket->Id ?>">
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">Name</label>
            <input name="Name" value="<?= $ticket->Fullname ?>" type="text" class="form-control" id="inputDefault">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">Email</label>
            <input name="Email" value="<?= $ticket->Email ?>" type="text" class="form-control" id="inputDefault">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">Problem</label>
            <textarea name="Message" class="form-control" id="inputDefault" rows="3"><?= $ticket->Message ?></textarea>
        </div>
        <div class="btn-group-vertical">
            <button type="Submit" class="btn btn-primary">Edit ticket</button>
        </div>
    </form>
</div>