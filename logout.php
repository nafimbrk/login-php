<?php
// session_start();
// session_destroy();
setcookie("username", "", time() - 3600, "/");
setcookie("nama", "", time() - 3600, "/");
header("Location: http://localhost/login/");
?>