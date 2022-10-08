<?php
    require_once "dbh.inc.php";

    $sql = "SELECT * FROM nation WHERE uid = ?;";
    $stmt = mysqli_stmt_init($ng);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=holyshitwtf");
        exit();
    }
    
    $uid = 1;

    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $resultdata = mysqli_fetch_array($result, MYSQLI_ASSOC);

    echo json_encode($resultdata);

    mysqli_stmt_close($stmt);
?>