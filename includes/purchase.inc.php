<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    session_start();

    if (isset($_POST["submit"])) {
        // Gather Factories from nation table
        $type = $_POST["type"]
        $id = 1;
        $sql = "SELECT `factories` from `nation` WHERE `nation`.`id` = ?;";
        $stmt = mysqli_stmt_init($ng);
                                                        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: /NG/admanage.php?error=facrefstmtfail");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $query = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);

        // Convert to assoc array
        $usr_factories = json_decode($query["factories"], true);
        print_r($_SESSION["resources"]);






        
        // Update factories list in nation table with new factories
        // $sql = "UPDATE `nation` SET `factories` = ? WHERE `nation`.`id` = ?;";
        // $stmt = mysqli_stmt_init($ng);
                                                        
        // if (!mysqli_stmt_prepare($stmt, $sql)) {
        //     header("location: /NG/admanage.php?error=facrefstmtfail");
        //     exit();
        // }
        
        // mysqli_stmt_bind_param($stmt, "si", $fac, $id);
        // mysqli_stmt_execute($stmt);
        // mysqli_stmt_close($stmt);


        
        // if (empty($_POST["name"]) || empty($_POST["ccount"]) || empty($_POST["icount"]) || empty($_POST["ocount"])) {
        //     //header("location: ../admanage.php");
        //     echo("e");
        // }

        // $name = $_POST["name"];
        // $level = $_POST["level"];
        // $icon = $_FILES['icon'];
        // $cost = $_POST["cost"] . ":" . $_POST["ccount"] . ",";
        // $input = $_POST["input"] . ":" . $_POST["icount"] . ",";
        // $output = $_POST["output"] . ":" . $_POST["ocount"] . ",";

        // This part of the page needs to add a prompt for the admin to view the factory in its completed stage and verify if it is correct, then prompt for creation.

        // makeFactory($ng, $name, $cost, $input, $output, $level, $icon);

        // header("location: /NG/admanage.php?error=facsuccess", true);
        exit();
    }
    else {
        //header("location: ../signup.php");
        echo("subfail");
        exit();
    }