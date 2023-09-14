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
    <div class='flexcontainer'>
        <?php
            $sql = "SELECT * FROM facref";
            $stmt = mysqli_stmt_init($ng);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../index.php?error=holyshitwtf");
                exit();
            };

            // mysqli_stmt_bind_param($stmt); Enable if I decide to restrict factory viewing by level
            mysqli_stmt_execute($stmt);
            $resultarr = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);

            while ($row = mysqli_fetch_assoc($resultarr)) {
                $name = $row["name"];
                $cost[] = makeAssoc($row["cost"]);
                $input[] = makeAssoc($row["input"]);
                $output[] = makeAssoc($row["output"]);
                $maxlevel = $row["maxlvl"];
                $icon = $row["icon"];
                // $tier = $row[6];

                echo("
                    <div class='flexchild'>
                        <div class=faccount>$maxlevel</div>
                        <h3><img src='img/resources/$icon'>      $name</h3><br>
                        <p>cost: </p> 
                        <div class=icholder>");

                        for($i = 0; $i < count($cost[0][0]); $i++) {
                            $name = $cost[0][1][$i];
                            $ct = $cost[0][0][$name];

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

                        for($i = 0; $i < count($input[0][0]); $i++) {
                            $name = $input[0][1][$i];
                            $ct = $input[0][0][$name];

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

                        for($i = 0; $i < count($output[0][0]); $i++) {
                            $name = $output[0][1][$i];
                            $ct = $output[0][0][$name];

                            echo("
                            <p>
                                <img class='ico' src='img/resources/".$name."_icon.webp'>" . $ct . "
                            </p>
                            ");
                        }

                        echo("</div>
                        <button>Purchase</button>
                    </div>
                ");
            }
        ?>
    </div>
</div>

<?php
    include_once "footer.php";
?>