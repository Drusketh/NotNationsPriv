<?php
    include_once "header.php";
?>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("includes/dbh.inc.php");
    include("includes/functions.inc.php");

    if (isset($_SESSION["uid"])) {
        if (verifyUser($ng, $_SESSION["uid"], 0, 0) == true) {
            if ($_SESSION["hasnation"] == 1) { //Nation Creation
                echo "
                    <div class='floatmenu'>
                        <div class='white'>
                            <h1 class='nname'>{$_SESSION['nname']}</h1>
                            <h1 class='lname'>Leader Name: {$_SESSION['name']}</h1>
                            <h1 class='popul'>Population: {$_SESSION['population']}</h1>
                            <h1 class='tier'>Tier: {$_SESSION['tier']}</h1>
                            <form action='req.inc.php' method='get'>press here to retrieve information</form>
                        </div>
                    </div>
                ";
            }
        }
        else {
            echo "Please log out and log back in, or stop messing with environment variables.";
        }
    }
    else {
        header("location: /NG/login.php");
        exit();
    }
?>

<?php
    include_once "footer.php";
?>