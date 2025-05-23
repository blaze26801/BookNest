<?php
// TODO: Dodac sprawdzanie poprawnosci danych uzytych do logowania.
    setcookie("loggedin", 1);
    header("Location: index.php");
    die();