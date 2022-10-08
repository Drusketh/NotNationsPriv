<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passv = $_POST["passv"];
    $curtime = time();

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputSignup($name, $email, $pass, $passv) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUname($name) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (passMatch($pass, $passv) !== false) {
        header("location: ../signup.php?error=invalidpwd");
        exit();
    }
    if (uidExists($ng, $name, $email) !== false) {
        header("location: ../signup.php?error=uidtaken");
        exit();
    }

    createUser($ng, $name, $email, $pass, $curtime);
}
else {
    header("location: ../signup.php");
    exit();
}