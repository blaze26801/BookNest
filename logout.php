<?php
unset($_COOKIE['loggedin']);
setcookie('loggedin', '', time() - 3600, '/');
header("Location: index.php");