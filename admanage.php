<?php
    include_once "header.php";
    include("includes/dbh.inc.php");
    include("includes/functions.inc.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<?php
    if (isset($_SESSION["uid"]) == false) {
        header("location: /NG/index.php", true);
        exit();
    }
    else {
        if (verifyUser($ng, $_SESSION["uid"], 1, 1) == false) {
            header("location: /NG/index.php", true);
            exit();
        }
        else {
            if ($_SESSION["ismod"] == 0) { 
                header("location: /NG/index.php", true);
                exit();
            }
            else {
                echo("guvvi");
            }
        }
    }
?>

        </div>  
    </body>
</html>

<?php
    ob_end_flush()
?>
