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
                $cost = $row["cost"];
                $input = $row["input"];
                $output = $row["output"];
                $maxlevel = $row["maxlvl"];
                $icon = $row["icon"];
                // $tier = $row[6];

                echo("
                    <div class='flexchild'>
                        <div class=faccount>$maxlevel</div>
                        <h3><img src='img/resources/$icon'>      $name</h3><br>
                        <p>cost: <br>");
                        
                        echo(json_encode($_SESSION["resref"]));
                        // foreach ($row = $cost) {
                        //     echo("<img src='img/resources/".$row['name']."_icon.webp'>  ". $cost[$row['name']] . "</p>");
                        // }

                        echo("<p>input: <br> $input</p>
                        <p>produce: <br> $output</p>
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