<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    session_start();

    if (isset($_POST["submit"])) {
        $formdata = explode(",", str_replace('"', '', json_encode($_POST)));
        
        if (empty($_POST["name"]) || empty($_POST["ccount"]) || empty($_POST["pcount"])) {
            header("location: ../admanage.php");
        }

        $name = $_POST["name"];
        $level = $_POST["level"];
        $icon = $_FILES['icon'];
        $cost = $_POST["cost"] . ":" . $_POST["ccount"] . ",";
        $produce = $_POST["produce"] . ":" . $_POST["pcount"] . ",";

        for ($i = 1; $i <= 10; $i++) {
            if(empty($_POST["cost" . strval($i)])) {}
            else {
                $cost = $cost . $_POST["cost" . strval($i)] . ":" . $_POST["ccount" . strval($i)] . ",";
            }
        }
        for ($i = 1; $i <= 10; $i++) {
            if(empty($_POST["produce" . strval($i)])) {}
            else {
                $produce = $produce . $_POST["produce" . strval($i)] . ":" . $_POST["pcount" . strval($i)] . ",";
            }
        }

        $cost = str_replace(array('"', '[', ']', ':', ','), array('', '{"', '}', '":', ',"'), json_encode(array_filter(explode(",", $cost))));
        $produce = str_replace(array('"', '[', ']', ':', ','), array('', '{"', '}', '":', ',"'), json_encode(array_filter(explode(",", $produce))));

        print_r($cost . "<br>" . $produce . "<br>");

        // This part of the page needs to add a prompt for the admin to view the factory in its completed stage and verify if it is correct, then prompt for creation.

        makeFactory($ng, $name, $cost, $produce, $level, $icon);

        header("location: /NG/admanage.php?error=facsuccess", true);
        exit();
    }
    else {
        header("location: ../signup.php");
        exit();
    }