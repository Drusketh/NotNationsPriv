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
            $sql = "SELECT * FROM resref;";
            $stmt = mysqli_stmt_init($ng);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../index.php?error=holyshitwtf");
                exit();
            };

            mysqli_stmt_execute($stmt);
            $resultarr = mysqli_fetch_array(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
            mysqli_stmt_close($stmt);

            echo(json_encode($resultarr));

            // for ($x = 2; $x < sizeof($resultarr); $x+=3) {
            //     $count = $resultarr[$x];
            //     $progression = $resultarr[$x+1];
            //     $level = $resultarr[$x+2];

            //     echo("
            //         <div class='flexchild'>
            //             <div class=faccount>$count</div>
            //             <h3>ex factory</h3><br>
            //             <p>facnum: $count</p>
            //             <p>amount: $progression/24</p>
            //             <p>level: $level</p>
            //             <button>collect</button>
            //         </div>
            //     ");
            // } 
        ?>
    </div>
</div>

<?php
    include_once "footer.php";
?>