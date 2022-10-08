<?php
ob_start();

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $pass = $_POST["pass"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputLogin($name, $pass) !== false) {
        header("location: ../login.php?error=emptyinput");
        ob_end_flush();
        exit();
    }

    loginUser($ng, $name, $pass);
}
else {
    header("location: ../login.php");
    ob_end_flush();
    exit();
}