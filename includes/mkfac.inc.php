<?php
    session_start();

    if (isset($_POST["submit"])) {
        $formdata = explode(",", str_replace('"', '', json_encode($_POST)));
        
        if (empty($_POST["name"]) || empty($_POST["ccount"]) || empty($_POST["pcount"])) {
            header("location: ../admanage.php");
        }

        echo(json_encode($_POST['name']));

        require_once "dbh.inc.php";
        require_once "functions.inc.php";
    }
    else {
        header("location: ../signup.php");
        exit();
    }