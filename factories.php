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
            $sql = "SELECT * FROM factories WHERE ID = ?;";
            $stmt = mysqli_stmt_init($ng);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../index.php?error=holyshitwtf");
                exit();
            };

            $uid = 1;

            mysqli_stmt_bind_param($stmt, "i", $uid);
            mysqli_stmt_execute($stmt);
            $resultarr = mysqli_fetch_array(mysqli_stmt_get_result($stmt), MYSQLI_NUM);
            mysqli_stmt_close($stmt);


            for ($x = 2; $x < sizeof($resultarr); $x+=3) {
                $count = $resultarr[$x];
                $progression = $resultarr[$x+1];
                $level = $resultarr[$x+2];

                echo("
                    <div class='flexchild'>
                        <div class=faccount>$count</div>
                        <h3>ex factory</h3><br>
                        <p>facnum: $count</p>
                        <p>amount: $progression/24</p>
                        <p>level: $level</p>
                        <button>collect</button>
                    </div>
                ");
            } 
        ?>
    </div>

    <form class='facform' action='includes/mkfac.inc.php' method='POST'>
        <ul>
            <li>
                <input type='text' name='name' placeholder='Name'>
            </li>
            <li>
                <p>Build Cost</p>
                <input type="text" name="cost" placeholder='cost'><input type="text" name="costct" placeholder='count'><br>
            </li>
            <li>
                <p>Collection</p>
                <input type="text" name="i1" placeholder='input1'><input type="text" name="i1ct" placeholder='count'><br>
                <input type="text" name="i2" placeholder='input2'><input type="text" name="i2ct" placeholder='count'><br>
                <input type="text" name="i3" placeholder='input3'><input type="text" name="i3ct" placeholder='count'><br>
                <input type="text" name="i4" placeholder='input4'><input type="text" name="i4ct" placeholder='count'><br>
                <input type="text" name="o1" placeholder='output1'><input type="text" name="o1ct" placeholder='count'><br>
                <input type="text" name="o1" placeholder='output2'><input type="text" name="o2ct" placeholder='count'>
            </li>
            <li>
                <button type='submit' name='submit'>Submit</button>
            </li>
        </ul>
    </form>
</div>


ALTER TABLE `factories` ADD `name(ct)` INT(6) NOT NULL DEFAULT '0' AFTER `dairylevel`, ADD `progression` INT(2) NOT NULL DEFAULT '0' AFTER `name(ct)`, ADD `level` INT(1) NOT NULL DEFAULT '0' AFTER `progression`; ?>

<?php
    include_once "footer.php";
?>