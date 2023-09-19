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
                        
                        $name = $factories[$idx]["name"];
                        $id = $idx;
                        $count = 1;
                        $cost = makeAssoc($factories[$idx]["cost"], 1);
                        $input = makeAssoc($factories[$idx]["input"], 1);
                        $output = makeAssoc($factories[$idx]["output"], 1);
                        $maxlevel = $factories[$idx]["maxlvl"];
                        $icon = $factories[$idx]["icon"];
                        // $tier = $factories[$i][6];
                        // print_r($cost);

                        echo("
                        <form class='factory' action='includes/purchase.inc.php' method='POST' enctype='multipart/form-data'>
                            <li class='tile'>
                                <div class=faccount>$maxlevel</div>
                                <h3><img src='img/resources/$icon'>      $name</h3><br>
                                <p>cost: </p> 
                                <div class=icholder>");

                                for($ci = 0; $ci < count($cost[0]); $ci++) {
                                    $name = $cost[1][$ci];
                                    $ct = $cost[0][$name];

                                    echo("
                                    <p>
                                        <img class='ico' src='img/resources/".$name."_icon.webp'>" . $ct . "
                                    </p>
                                    ");
                                }

                                echo("
                                </div>
                                <p>input: </p> 
                                <div class=icholder>
                                ");

                                for($ii = 0; $ii < count($input[0]); $ii++) {
                                    $name = $input[1][$ii];
                                    $ct = $input[0][$name];

                                    echo("
                                    <p>
                                        <img class='ico' src='img/resources/".$name."_icon.webp'>" . $ct . "
                                    </p>
                                    ");
                                }

                                echo("
                                </div>
                                <p>produce: </p>
                                <div class=icholder>
                                ");

                                for($oi = 0; $oi < count($output[0]); $oi++) {
                                    $name = $output[1][$oi];
                                    $ct = $output[0][$name];

                                    echo("
                                    <p>
                                        <img class='ico' src='img/resources/".$name."_icon.webp'>" . $ct . "
                                    </p>
                                    ");
                                }
                                echo("</div>
                                    <input type='hidden' name='id' value=" . $id . ">
                                    <input type='hidden' name='count' value=" . $count . ">
                                    <span class='popup'>Purchase</button>
                                ");
                                
                                // <button type='submit' name='submit' value='upload'>Purchase</button>

                                echo("
                            </li>
                        </form>
                        ");
                    }
                }
            ?>
        </ul>
    </section>
</div>

<?php
    include_once "footer.php";
?>