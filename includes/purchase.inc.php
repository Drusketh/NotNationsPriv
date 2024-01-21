<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    session_start();

    if (isset($_GET["submit"])) {
        $type = $_GET["t"];
        $id = $_GET["i"];
        $fid = $id-1;
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
                    $sql = "SELECT * from `facref`;";
                    $stmt = mysqli_stmt_init($ng);
                                                                    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: /NG/admanage.php?error=facrefstmtfail");
                        exit();
                    }
                    
                    mysqli_stmt_execute($stmt);
                    $q1 = mysqli_stmt_get_result($stmt);
                    mysqli_stmt_close($stmt);
                    while($facdata[] = mysqli_fetch_assoc($q1));
                    array_pop($facdata);
                }

                $name = $facdata[$fid]["name"];
                $cost = makeAssoc($facdata[$fid]["cost"], 1);

                $i=0;
                foreach ($cost[0] as $v) {
                    $cres = $cost[1][$i];
                    $camnt = $usr_resources[$cres];
                    $tres = $v*$count;
                    $pass = 0;
                    
                    $i++;
                    if ($camnt < $tres) {
                        $pass = 0;
                    }
                    else {
                        $pass = 1;
                    }
                }

                if ($pass = 1) {
                    $usr_resources[$cres]-=$tres;
                    $usr_factories[$name]+=$count;

                    $usr_resources = json_encode($usr_resources);
                    $usr_factories = json_encode($usr_factories);
                }
                else {
                    //Fail condition. Send back to construct page with an error. idk how they got here since the form should prevent them eventually.
                }
                
                // $i=0;
                // $facs = array();
                // foreach ($facdata as $v) {
                //     print_r($v["name"]);
                //     echo("<br>");
                //     $facs[$v["name"]] = 0;
                //     $i++;
                // }

                // print_r(json_encode($facs));

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

                    $sql = "UPDATE `nation` SET factories=? WHERE `uid` = ?;";
                    $stmt = mysqli_stmt_init($ng);
                                                                    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: /NG/admanage.php?error=facrefstmtfail");
                        exit();
                    }
                    
                    mysqli_stmt_bind_param($stmt, "si", $usr_factories, $_SESSION['uid']);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                }   
                //{"money":1000000,"power":1000000,"food":1000000,"bm":1000000,"cg":1000000,"metal":1000000,"ammunition":1000000,"fuel":1000000,"uranium":1000000}
            break;
        }

        header("location: ../construct.php");
        exit();
    }
    else {
        header("location: ../signup.php");
        echo("subfail");
        exit();
    }