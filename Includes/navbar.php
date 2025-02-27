<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" style="padding-bottom: 0;">
    <div class="navbar-toggler-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse flex-column" id="navbar">
        <ul class="navbar-nav w-100 px-3">
            <li class="nav-item">
                <a href="/"><img src="/img/logo/Imdb2_logo.png" style="height:64px"/></a>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="padding: 1.5rem 0.9rem;" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="padding: 1.5rem 0.9rem;" href="/news.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="padding: 1.5rem 0.9rem;" href="/contact.php">Contact</a>
                </li>
<?php if($User!=null and $User->IsAdmin()){ ?>
                <li class="nav-item">
                    <a class="nav-link" style="padding: 1.5rem 0.9rem;" href="/admin.php">Admin panel</a>
                </li>
<?php } ?>
            </ul>
        </ul>

        <ul class="navbar-nav w-100 px-3" style="border-top: 1px dashed #ffffff44;">
            <li class="nav-item">
                <a class="nav-link" href="/movies.php">Show all</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/movies.php?sort=latest">Latest trailers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/movies.php?sort=mostcommented">Most commented</a>
            </li>
            <ul class="navbar-nav ml-auto">
                <div style="padding:0.3rem 0.5rem 0.2rem;">
                    <form action="/movies.php">
                        <div class="row">
                            <div class="col-8 px-1">
                                <input class="form-control form-control-sm" type="text" name="search" <?= !empty($_GET["search"]) ? 'value="'.$_GET["search"].'"' : 'placeholder="Søg"' ?>>
                            </div>
                            <div class="col-4 px-1">
                                <button type="submit" class="btn btn-link" style="padding: 0.2rem 0.75rem 0;color: rgba(255,255,255,.5);">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </ul>
        </ul>
        <ul class="navbar-nav w-100 px-3" style="border-top: 1px dashed #ffffff44;">
            <ul class="navbar-nav ml-auto">
<?php if($User==null) { ?>
                <div style="padding:0.3rem 0.5rem 0.2rem;">
                    <form action="/actions/account/signin.php" method="POST">
                        <div class="row">
                            <div class="col-5 px-1">
                                <input class="form-control form-control-sm" name="email" type="text" placeholder="Email address">
                            </div>
                            <div class="col-5 px-1">
                                <input class="form-control form-control-sm" name="password" type="password" placeholder="Password">
                            </div>
                            <div class="col-2 px-1">
                                <button type="submit" class="btn btn-link" style="padding: 0.2rem 0.75rem 0;color: rgba(255,255,255,.5);">Signin</button>
                            </div>
                        </div>
                    </form>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="/signup.php">Not a member?</a>
                </li>
<?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="/profile.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/actions/account/signout.php">Signout</a>
                </li>
<?php } ?>
            </ul>
        </ul>
    </div>
</nav>