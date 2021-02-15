    <div class="container">
        <form name="form" method="post" action="actions/admin/movies/create.php" enctype="multipart/form-data">
            <h3><b>Movie</b></h3>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Title</label>
                <input name="Title" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Lenght</label>
                <input name="Lenght" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Age Rating</label>
                <input name="AgeRating" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Description</label>
                <textarea name="Description" class="form-control" id="inputDefault" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Releasedate</label>
                <input name="Release" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Poster</label>
                <input name="PosterImg" type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Trailer link</label>
                <input name="TrailerLink" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Rating</label>
                <input name="Rating" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Directors</label>
                <input name="Director" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Writers</label>
                <input name="Writer" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Stars</label>
                <input name="Stars" type="text" class="form-control" id="inputDefault">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Genre</label>
                <input name="Genres" type="text" class="form-control" id="inputDefault">
            </div> 
            <div class="btn-group-vertical">
                <button type="Submit" class="btn btn-primary">Opret film</button>
            </div>
        </form>
    </div>