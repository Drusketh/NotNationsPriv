<?php

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

function emptyInputBug($uid, $name, $body, $sev) {
    $result;
    if (empty($uid) || empty($name) || empty($body) || empty($sev)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($name) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}