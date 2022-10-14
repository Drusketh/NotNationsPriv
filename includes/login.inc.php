<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $pass = $_POST["pass"];

    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';

    echo("postrequire");

    if (testecho() == true) {
        echo("true");
    }
    else {
        echo("false");
    }

    if (emptyInputLogin($name, $pass) !== false) {
        echo("empty");
        header("location: /NG/login.php?error=emptyinput");
        echo("emptyph");
        exit();
    }
    
    echo("else");
    loginUser($ng, $name, $pass);
}
else {
    echo("else");
    header("location: /NG/login.php");
    exit();
}
?>