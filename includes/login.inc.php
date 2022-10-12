<?php
ob_start();

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $pass = $_POST["pass"];

    include('/includes/dbh.inc.php');
    include('/includes/functions.inc.php');

    echo("postrequire");
    if (emptyInputLogin($name, $pass) !== false) {
        echo("empty");
        header("location: ../login.php?error=emptyinput");
        ob_end_flush();
        echo("emptyph");
        exit();
    }
    else{
        echo("else");
        loginUser($ng, $name, $pass);
    }
}
else {
    echo("else");
    header("location: ../login.php");
    ob_end_flush();
    exit();
}
?>