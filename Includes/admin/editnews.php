<?php
        $news = new News ($Database);
        $news->Get($_GET["id"]);
    ?>
<div class="container">
    <form name="form" method="post" action="actions/admin/news/edit.php">
        <input type="hidden" name="id" value="<?= $news->Id ?>">
        <h3><b>News</b></h3>
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">Title</label>
            <input name="Title" value="<?= $news->Title ?>" type="text" class="form-control" id="inputDefault">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">Description</label>
            <textarea name="Description" class="form-control" id="inputDefault" rows="5"><?= $news->Description ?></textarea>
        </div>
        <div class="btn-group-vertical">
            <button type="Submit" class="btn btn-primary">Edit news</button>
        </div>
    </form>
</div>