<?php
session_start();

if (isset($_POST["submit"])) {
    $uid = $_SESSION["uid"];
    $name = $_POST["title"];
    $body = $_POST["body"];
    $sev = $_POST["severity"];
    $time = time();

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputBug($uid, $name, $body, $sev) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($uid) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (noTitle($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (noBody($pass, $passv) !== false) {
        header("location: ../signup.php?error=invalidpwd");
        exit();
    }
    if (noSeverity($ng, $name, $email) !== false) {
        header("location: ../signup.php?error=uidtaken");
        exit();
    }

    createUser($ng, $name, $email, $pass, $curtime);
}
else {
    header("location: ../signup.php");
    exit();
}