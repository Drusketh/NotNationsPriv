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

        $result = mysqli_stmt_get_result($stmt);
        $resultarr = mysqli_fetch_array($result, MYSQLI_ASSOC);

        echo json_encode ($resultarr);

        mysqli_stmt_close($stmt);
    ?>


    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
    <div class='flexchild'>
        <p>title</p>
    </div>
</div>

<form class='facform' action='includes/makefactory.inc.php' method='POST'>
    <ul>
        <li>
            <input type='text' name='name' placeholder='Name'>
        </li>
        <li>
            <input type='text' name='cost' placeholder='cost to build'>
        </li>
        <li>
            <label for="input1">Input1:</label>
            <select name="input1">
                <option value="money">money</option>
                <option value="food">food</option>
                <option value="power" selected>power</option>
                <option value="BM's">BM</option>
            </select>
        </li>
        <li>
            <button type='submit' name='submit'>Submit</button>
        </li>
    </ul>
</form>
ALTER TABLE `factories` ADD `name(ct)` INT(6) NOT NULL DEFAULT '0' AFTER `dairylevel`, ADD `progression` INT(2) NOT NULL DEFAULT '0' AFTER `name(ct)`, ADD `level` INT(1) NOT NULL DEFAULT '0' AFTER `progression`; ?>

<?php
    include_once "footer.php";
?>