<?php
    session_start();
    require_once "dbh.inc.php";
    require_once "functions.inc.php";
    if (isset($_SESSION["uid"])) {
        if (verifyUser($ng, $_SESSION["uid"], 0, 0) == true) {
            if ($_SESSION["hasnation"] == 1) {
                $resources = $_SESSION["resources"];
                print_r($resources);
                $uid = $_SESSION["uid"];
                $pop = intval($_SESSION["population"]) + 1000;
                $_SESSION["population"] = $pop;

                $sql = "UPDATE nation SET population = ? WHERE uid = ?;";
                $stmt = mysqli_stmt_init($ng);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../index.php?error=holyshitwtf");
                    exit();
                };

                mysqli_stmt_bind_param($stmt, "ii", $pop, $uid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                
                echo($_SERVER["HTTP_REFERER"]);

                header("location: " . $_SERVER["HTTP_REFERER"]);
                exit();
            }
        }
    }else {
        echo"session";
    }
?>