<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $pass = $_POST["pass"];

        require_once '../includes/dbh.inc.php';
        require_once '../includes/functions.inc.php';

        if (emptyInputLogin($name, $pass) !== false) {
            header("location: /NG/login.php?error=emptyinput");
            exit();
        }

        loginUser($ng, $name, $pass);
    }
    else {
        header("location: /NG/login.php");
        exit();
    }
?>