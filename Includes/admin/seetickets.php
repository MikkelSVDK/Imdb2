<div class="form-group">
    <label class="col-form-label" for="inputDefault">Name</label>
    <input name="Name" value="<?= $tickets->name ?>" type="text" class="form-control" id="inputDefault">
</div>
<div class="form-group">
    <label class="col-form-label" for="inputDefault">email</label>
    <input name="Name" value="<?= $tickets->email ?>" type="text" class="form-control" id="inputDefault">
</div>
<div class="form-group">
    <label class="col-form-label" for="inputDefault">Problem</label>
    <textarea name="Description" class="form-control" id="inputDefault" rows="3"><?= $tickets->Message ?></textarea>
</div>