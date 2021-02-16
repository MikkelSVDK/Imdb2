<?php
$currentUser = new User($Database);
$currentUser->Get($_GET["id"]);
?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <form name="form" method="post" action="actions/admin/user/updateimg.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $currentUser->Id ?>" />
                        <div class="form-group">
                            <img class="img-fluid" src="/img/<?= $currentUser->GetImage() ?>" alt="">
                            <input type="file" name="img" class="form-control-file" onchange="form.submit()">
                        </div>
                    </form>
                </div>
                <div class="col-lg-8">
                    <form action="/actions/admin/user/updateinfo.php" method="POST">
                        <input type="hidden" name="id" value="<?= $currentUser->Id ?>" />
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="email" value="<?= $currentUser->Email ?>">
                            </div>
                            <label class="col-sm-2 col-form-label">Fornavn</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="firstname" value="<?= $currentUser->Firstname ?>">
                            </div>
                            <label class="col-sm-2 col-form-label">Efternavn</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="lastname" value="<?= $currentUser->Lastname ?>">
                            </div>
                            <label class="col-sm-2 col-form-label">Telefon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="phone" value="<?= $currentUser->Phone ?>">
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