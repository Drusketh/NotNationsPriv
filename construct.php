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
    <section class='flexcontainer'>
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
                        $i = $idx-1;
                        
                        $name = $factories[$idx]["name"];
                        $cost[] = makeAssoc($factories[$idx]["cost"]);
                        $input[] = makeAssoc($factories[$idx]["input"]);
                        $output[] = makeAssoc($factories[$idx]["output"]);
                        $maxlevel = $factories[$idx]["maxlvl"];
                        $icon = $factories[$idx]["icon"];
                        // $tier = $factories[$i][6];

                        echo("
                            <li class='tile'>
                                <div class=faccount>$maxlevel</div>
                                <h3><img src='img/resources/$icon'>      $name</h3><br>
                                <p>cost: </p> 
                                <div class=icholder>");

                                for($ci = 0; $ci < count($cost[$i][0]); $ci++) {
                                    $name = $cost[$i][1][$ci];
                                    $ct = $cost[$i][0][$name];

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

                                for($ii = 0; $ii < count($input[$i][0]); $ii++) {
                                    $name = $input[$i][1][$ii];
                                    $ct = $input[$i][0][$name];

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

                                for($oi = 0; $oi < count($output[$i][0]); $oi++) {
                                    $name = $output[$i][1][$oi];
                                    $ct = $output[$i][0][$name];

                                    echo("
                                    <p>
                                        <img class='ico' src='img/resources/".$name."_icon.webp'>" . $ct . "
                                    </p>
                                    ");
                                }
                                echo("</div>");

                                echo("<button>Purchase</button>
                            </li>
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