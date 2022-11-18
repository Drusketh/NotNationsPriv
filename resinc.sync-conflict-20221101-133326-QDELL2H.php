<?php
    session_start();
    require_once "includes/dbh.inc.php";
    require_once "includes/functions.inc.php";
    if (isset($_SESSION["uid"])) {
        if (verifyUser($ng, $_SESSION["uid"], 0, 0) == true) {
            if ($_SESSION["hasnation"] == 1) {
                $uid   = $_SESSION["uid"];
                $money = $_SESSION["money"] + 1000;
                $food  = $_SESSION["food"] + 120;
                $power = $_SESSION["power"] + 150;
                $bm    = $_SESSION["bm"];
                $cg    = $_SESSION["cg"];
                $metal = $_SESSION["metal"];
                $fuel  = $_SESSION["fuel"];
                $ammo  = $_SESSION["ammo"];

                $sql = "UPDATE resources SET money = ?, food = ?, power = ?, bm = ?, cg = ?, metal = ?, fuel = ?, ammunition = ? WHERE uid = ?;";
                $stmt = mysqli_stmt_init($ng);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../index.php?error=holyshitwtf");
                    exit();
                };

                mysqli_stmt_bind_param($stmt, "iiiiiiiii", $money, $food, $power, $bm, $cg, $metal, $fuel, $ammo, $uid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                header("location: factories.php");
                exit();
            }
        }
    }else {
        echo"session";
    }
?>