<?php
    include_once "header.php";
    include("includes/dbh.inc.php");
    include("includes/functions.inc.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $sql = "SELECT `name` FROM `resref`;";

    $stmt = mysqli_stmt_init($ng);
                                            
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /NG/admanage.php?error=stmtfail");
        exit();
    }
                                            
    mysqli_stmt_execute($stmt);

    $resref = array();
    while ($row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))) {
        $resref = $row;
    }
    mysqli_stmt_close($stmt);
?>