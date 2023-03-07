<?php
    include_once "header.php";
    include("includes/dbh.inc.php");
    include("includes/functions.inc.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<?php

                        $sql = "SELECT * FROM `resources` where uid = ?;";
                        $stmt = mysqli_stmt_init($ng);
                                                                
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("location: /NG/admanage.php?error=stmtfail");
                            exit();
                        }
                                                    
                        mysqli_stmt_bind_param($stmt, "i", $_SESSION["uid"]);
                        mysqli_stmt_execute($stmt);
                        $query = mysqli_stmt_get_result($stmt);
                        mysqli_stmt_close($stmt);

                        $resources = array();
                        while ($row = mysqli_fetch_assoc($query)) {
                            array_push($resources, $row);
                        }

                        print_r($resources);



                        $rsql = "SELECT `resources` FROM `nation` where uid = ?;";
                        $rstmt = mysqli_stmt_init($ng);
                                                                
                        if (!mysqli_stmt_prepare($rstmt, $rsql)) {
                            header("location: /NG/admanage.php?error=stmtfail");
                            exit();
                        }
                                                    
                        mysqli_stmt_bind_param($rstmt, "i", $_SESSION["uid"]);
                        mysqli_stmt_execute($rstmt);
                        $rquery = mysqli_stmt_get_result($rstmt);
                        mysqli_stmt_close($rstmt);
                        
                        $res = mysqli_fetch_assoc($rquery);
                        print_r(json_decode($res['resources'], true));

                        $resources = array();
                        while ($row = mysqli_fetch_assoc($rquery)) {
                            array_push($resources, $row);
                        }

                        

?>