<?php
    include_once "header.php";
?>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("includes/dbh.inc.php");
    include("includes/functions.inc.php");
?>

<div class='gamecontent'>
    <div class='tilecontainer'>
        <ul>
        <?php
            $sql = "SELECT * FROM `facref`;";
            $stmt = mysqli_stmt_init($ng);
                                                    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: /NG/admanage.php?error=facrefstmtfail");
                exit();
            }
                                                    
            mysqli_stmt_execute($stmt);
            $q1 = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            
            while($facref[] = mysqli_fetch_assoc($q1));
            array_pop($facref);

            $sql = "SELECT factories FROM nation WHERE uid=".$_SESSION["uid"].";";
            $stmt = mysqli_stmt_init($ng);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: /NG/admanage.php?error=facrefstmtfail");
                exit();
            }
            
            mysqli_stmt_execute($stmt);
            $q1 = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);

            while($factories[] = mysqli_fetch_assoc($q1));
            array_pop($factories);

            print_r($factories);

            for ($i = 1; $i <= 100; $i++) {
                $data = [round(random_int(0, 120000)),1];
                makeGCard("Factory", $data);
            }
        ?>
        </ul>
    </div>
</div>

<?php
    include_once "footer.php";
?>