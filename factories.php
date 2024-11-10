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
            {
                $sql = "SELECT factories FROM nation WHERE uid=".$_SESSION["uid"].";";
                $stmt = mysqli_stmt_init($ng);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: /NG/admanage.php?error=facrefstmtfail");
                    exit();
                }
                mysqli_stmt_execute($stmt);
                $q1 = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
            }

            {
                $sql2 = "SELECT * FROM `facref`;";
                $stmt2 = mysqli_stmt_init($ng);
                if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                    header("location: /NG/admanage.php?error=facrefstmtfail");
                    exit();
                }
                mysqli_stmt_execute($stmt2);
                $q2 = mysqli_stmt_get_result($stmt2);
                mysqli_stmt_close($stmt2);
            }

            $check = mysqli_fetch_assoc($q1)["factories"];

            while($facref[] = mysqli_fetch_assoc($q2));
            array_pop($facref);

            if (strlen($check) <= 2) {
                echo("
                    <h1> You don't have any factories built yet! Click on the \"Construct\" Tab to build some!
                ");
            } else{
                $usr_factories = makeAssoc($check, 1);
                for ($i = 0; $i <= count($usr_factories[0])-1; $i++) {
                    $obj = $usr_factories[1][$i];
                    $facname = $obj;
                    $count = $usr_factories[0][$obj];
                    $input = makeAssoc($facref[$i]["input"], 1);
                    $output = makeAssoc($facref[$i]["output"], 1);
                    $level = $facref[$i]["maxlvl"];
                    $icon = $facref[$i]["icon"];

                    $data = [$facname, $icon, $count, $input, $output, $level];

                    makeGCard("factory", $data);
                }

                // for ($i = 1; $i <= 1000; $i++) {
                //     $data = [round(random_int(0, 120000)),1];
                //     makeGCard("Factory", $data);
                // }
            }
        ?>
        </ul>
    </div>
</div>

<?php
    include_once "footer.php";
?>