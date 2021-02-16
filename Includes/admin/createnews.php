<div class="container">
        <form name="form" method="post" action="actions/admin/news/create.php">
            <h3><b>News</b></h3>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Title</label>
                <input name="Title" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Description</label>
                <textarea name="Description" class="form-control" id="inputDefault" rows="5"></textarea>
            </div>
            <div class="btn-group-vertical">
                <button type="Submit" class="btn btn-primary">Create news</button>
            </div>
        </form>
    </div>