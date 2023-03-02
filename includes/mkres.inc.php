<?php
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $icon = $_POST["icon"];

        if (emptyInputLogin($name, $icon) !== false) {
            header("location: /NG/admanage.php?error=emptyinput");
            exit();
        }
        
        makeResource($ng, $name, $icon);

        header("location: /NG/admanage.php?error=success", true);
        exit();
    }
    else {
        header("location: /NG/login.php");
        exit();
    }
?>