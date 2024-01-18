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
    <section class='tilecontainer factories'>
        <ul>
            <?php
                $sql = "SELECT * FROM `facref`;";

                $stmt = mysqli_stmt_init($ng);
                                                        
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: /NG/admanage.php?error=facrefstmtfail");
                    exit();
                }
                                                        
                mysqli_stmt_execute($stmt);
                $query = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                
                $factories[] = array();
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($factories, $row);
                }

                for ($idx = 0; $idx <= count($factories)-1; $idx++) {
                    if (count($factories[$idx]) == 0) {}else {
                        $facname = $factories[$idx]["name"];
                        $id = $factories[$idx]["id"];
                        $count = 1;
                        $cost = makeAssoc($factories[$idx]["cost"], 1);
                        $input = makeAssoc($factories[$idx]["input"], 1);
                        $output = makeAssoc($factories[$idx]["output"], 1);
                        $maxlevel = $factories[$idx]["maxlvl"];
                        $icon = $factories[$idx]["icon"];
                        // $tier = $factories[$i][6];

                        makeCard($facname, $id, $count, $cost, $input, $output, $maxlevel, $icon);
                    }
                }
            ?>
        </ul>
    </section>
</div>

<?php
    include_once "footer.php";
?>