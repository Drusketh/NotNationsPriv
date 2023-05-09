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
            $stmt = mysqli_prepare($ng, "SELECT * FROM facref");
            
            mysqli_stmt_execute($stmt);
            $resultarr = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);

            while ($row = mysqli_fetch_array($resultarr, MYSQLI_NUM)) {
                $id = $row[0];
                $name = $row[1];
                $cost = $row[2];
                $produce = $row[3];
                $level = $row[4];
                $icon = $row[5];
                echo($id);
                echo($name);
                echo($cost);
                echo($produce);
                echo($level);
                echo($icon);
                echo("
                    <div class='flexchild'>
                        <div class=faccount>".$count."</div>
                        <h3>ex factory</h3><br>
                        <p>facnum:". $count."</p>
                        <p>amount:". $progression."/24</p>
                        <p>level:". $level."</p>
                        <button>collect</button>
                    </div>
                ");
        `   }
        ?>
    </div>
</div>

<?php
    include_once "footer.php";
?>