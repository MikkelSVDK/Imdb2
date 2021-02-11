<?php
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/core.php");
unset($_SESSION["uid"]);
header("Location: /");