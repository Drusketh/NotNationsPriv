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
                $modres = $usr_resources;
                $modfac = $usr_factories;
                
                $i=0;
                for ($i = 0; $i <= count($cost[0])-1; $i++) {
                    $cres = $cost[1][$i];
                    $camnt = $usr_resources[$cres];
                    $tres = $cost[0][$cost[1][$i]]*$count;
                    $pass = 0;
                    
                    
                    if ($camnt < $tres) {
                        $pass = 0;

                        print_r("fail");

                        header("location: ../construct.php");
                        exit();
                    }
                    else {
                        $pass = 1;
                        $modres[$cres]-=$tres;
                    }
                }

                if ($pass = 1) {
                    $modfac[$name]+=$count;

                    $usr_resources = json_encode($modres);
                    $usr_factories = json_encode($modfac);
                }
                else {
                    //Fail condition. Send back to construct page with an error. idk how they got here since the form should prevent them eventually.
                }

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