<?php

if (isset($_POST["submit"])) {
    $uid = $_POST["uid"];
    $name = $_POST["nname"];
    $capitol = $_POST["ncapitol"];
    $govt = $_POST["govt"];
    $econ = $_POST["econ"];
    $biome = $_POST["biome"];
    $curtime = time();

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputNation($name, $capitol, $govt, $econ, $biome) !== false) {
        // echo("uid " . $uid . " name " . $name . " capitol " . $capitol . " govt " . $govt . " econ " . $econ . " biome " . $biome . " curtime " . $curtime);
        // echo(empty($uid));
        // echo(empty($name));
        // echo(empty($capitol));
        // echo(empty($govt));
        // echo(empty($econ));
        // echo(empty($biome));
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if (invalidNC($name, $capitol) !== false) {
        header("location: ../index.php?error=invaliduid");
        exit();
    }
    if (invalidInput($name, $capitol, $govt, $econ, $biome) !== false) {
        header("location: ../index.php?error=invalidemail");
        exit();
    }
    if (nationExists($ng, $name) !== false) {
        header("location: ../index.php?error=uidtaken");
        exit();
    }

    createNation($ng, $uid, $name, $capitol, $biome, $govt, $econ, $curtime);
}
else {
    header("location: ../index.php");
    exit();
}