<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    session_start();

    if (isset($_GET["submit"])) {
        $type = $_GET["t"];
        $id = $_GET["i"];
        $count = $_GET["count"];

        switch ($type) {
            case "f": // Factory purchase
                if (true) {
                    //Factories
                    $sql = "SELECT `factories` from `nation` WHERE `nation`.`id` = ?;";
                    $stmt = mysqli_stmt_init($ng);
                                                                    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: /NG/admanage.php?error=facrefstmtfail");
                        exit();
                    }
                    
                    mysqli_stmt_bind_param($stmt, "i", $_SESSION['uid']);
                    mysqli_stmt_execute($stmt);
                    $usr_factories = json_decode(mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))["factories"], true);
                    mysqli_stmt_close($stmt);
                    
                    //Resources
                    $sql = "SELECT `resources` from `nation` WHERE `nation`.`id` = ?;";
                    $stmt = mysqli_stmt_init($ng);
                                                                    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: /NG/admanage.php?error=facrefstmtfail");
                        exit();
                    }
                    
                    mysqli_stmt_bind_param($stmt, "i", $_SESSION['uid']);
                    mysqli_stmt_execute($stmt);
                    $usr_resources = json_decode(mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))["resources"], true);
                    mysqli_stmt_close($stmt);

                    //Cost
                    $sql = "SELECT `cost` from `facref` WHERE `id` = ?;";
                    $stmt = mysqli_stmt_init($ng);
                                                                    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: /NG/admanage.php?error=facrefstmtfail");
                        exit();
                    }
                    
                    mysqli_stmt_bind_param($stmt, "i", $id);
                    mysqli_stmt_execute($stmt);
                    $cost = makeAssoc(mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))['cost'], 1);
                    mysqli_stmt_close($stmt);
                }

                
                echo("count: ".$count);
                echo("<br> Current Factories <br>");
                print_r($usr_factories);
                echo("<br> Current Resources <br>");
                print_r($_SESSION["resources"]);
                echo("<br> Total Cost <br>");
                print_r($cost);
                $i=0;
                foreach ($cost[0] as $v) {
                    $cres = $cost[1][$i];
                    $camnt = $usr_resources[$cres];
                    $tres = $v*$count;
                    echo("<br>".$cres.": ".$camnt);
                    echo("<br> cost: ".$tres);
                    $i++;
                    if ($camnt < $tres) {
                        echo("<br> cant afford");
                    }
                    else {
                        $usr_resources[$cres]-=$tres;
                    }

                    echo("<br>".$cres.": ".$camnt."<br>");
                }
                print_r($usr_resources);
                echo("<br>");
                $usr_resources = json_encode($usr_resources);
                echo($usr_resources);

                if (true) {
                    $sql = "UPDATE `nation` SET resources=? WHERE `uid` = ?;";
                    $stmt = mysqli_stmt_init($ng);
                                                                    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: /NG/admanage.php?error=facrefstmtfail");
                        exit();
                    }
                    
                    mysqli_stmt_bind_param($stmt, "si", $usr_resources, $_SESSION['uid']);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                }
                //{"money":1000000,"power":1000000,"food":1000000,"bm":1000000,"cg":1000000,"metal":1000000,"ammunition":1000000,"fuel":1000000,"uranium":1000000}
            break;
        }






        
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