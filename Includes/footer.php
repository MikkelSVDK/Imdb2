<?php if(isset($_COOKIE["error"])) { ?>
<div class="alert alert-dismissible alert-danger error-box-bottom">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Ups!</strong> <?= $_COOKIE["error"] ?>
</div>
<?php } ?>
<footer class="footer">
    <div class="bg-primary" style="top:unset;bottom:0;color:white;padding:0.5rem 0.9rem">
        <center>
            <a href="/">HOME</a> | <a href="/news.php">NEWS</a> | <a href="/contact.php">CONTACT</a><br>
            <a href=""><i class="fab fa-facebook-square"></i></a>&nbsp;
            <a href=""><i class="fab fa-twitter"></i></a>&nbsp;
            <a href=""><i class="fab fa-instagram"></i></a>&nbsp;
            <a href=""><i class="fab fa-youtube"></i></a><br>
            © <?= date("Y") ?> IMDB2 Aps
        </center>
    </div>
</footer>