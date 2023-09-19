<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    session_start();

    if (isset($_POST["submit"])) {
        // $_POST = json_encode($_POST);
        
        if (empty($_POST["name"]) || empty($_POST["ccount"]) || empty($_POST["icount"]) || empty($_POST["ocount"])) {
            //header("location: ../admanage.php");
            echo("e");
        }

        $name = $_POST["name"];
        $level = $_POST["level"];
        $icon = $_FILES['icon'];
        $cost = $_POST["cost"] . ":" . $_POST["ccount"] . ",";
        $input = $_POST["input"] . ":" . $_POST["icount"] . ",";
        $output = $_POST["output"] . ":" . $_POST["ocount"] . ",";

        for ($i = 1; $i <= 10; $i++) {
            if(empty($_POST["cost" . strval($i)])) {}
            else {
                $cost = $cost . $_POST["cost" . strval($i)] . ":" . $_POST["ccount" . strval($i)] . ",";
            }
        }
        for ($i = 1; $i <= 10; $i++) {
            if(empty($_POST["input" . strval($i)])) {}
            else {
                $input = $input . $_POST["input" . strval($i)] . ":" . $_POST["icount" . strval($i)] . ",";
            }
        }
        for ($i = 1; $i <= 10; $i++) {
            if(empty($_POST["output" . strval($i)])) {}
            else {
                $output = $output . $_POST["output" . strval($i)] . ":" . $_POST["ocount" . strval($i)] . ",";
            }
        }

        $cost = str_replace(array('"', '[', ']', ':', ','), array('', '{"', '}', '":', ',"'), json_encode(array_filter(explode(",", $cost))));
        $input = str_replace(array('"', '[', ']', ':', ','), array('', '{"', '}', '":', ',"'), json_encode(array_filter(explode(",", $input))));
        $output = str_replace(array('"', '[', ']', ':', ','), array('', '{"', '}', '":', ',"'), json_encode(array_filter(explode(",", $output))));

        // This part of the page needs to add a prompt for the admin to view the factory in its completed stage and verify if it is correct, then prompt for creation.

        makeFactory($ng, $name, $cost, $input, $output, $level, $icon);

        header("location: /NG/admanage.php?error=facsuccess", true);
        exit();
    }
    else {
        //header("location: ../signup.php");
        echo("subfail");
        exit();
    }