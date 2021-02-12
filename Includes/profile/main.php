        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <img class="img-fluid" src="/img/<?= $User->GetImage() ?>" alt="">
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="/actions/profile/updateinfo.php" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="email" value="<?= $User->Email ?>">
                            </div>
                            <label class="col-sm-2 col-form-label">Fornavn</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="firstname" value="<?= $User->Firstname ?>">
                            </div>
                            <label class="col-sm-2 col-form-label">Efternavn</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="lastname" value="<?= $User->Lastname ?>">
                            </div>
                            <label class="col-sm-2 col-form-label">Telefon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="phone" value="<?= $User->Phone ?>">
                            </div>
                            <div class="col-sm-12 btn-group-vertical">
                                <br>
                                <button type="submit" class="btn btn-primary">Gem</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="/actions/profile/updatepassword.php" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control-plaintext" name="password" placeholder="Nye kode">
                            </div>
                            <label class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control-plaintext" name="repeatpassword" placeholder="Gentag nye kode">
                            </div>
                            <div class="col-sm-12 btn-group-vertical">
                                <br>
                                <button type="submit" class="btn btn-primary">Gem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>