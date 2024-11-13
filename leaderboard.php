<?php
    include_once "header.php";
    include_once "includes/functions.inc.php";
    include_once "includes/dbh.inc.php";
?>

<div class='gamecontent'>
    <div class='tilecontainer'>
        <ul>
        <?php
            {
                $sql = 
                "SELECT 
                    id, 
                    name, 
                    capitol, 
                    population,
                    (SELECT COUNT(*) + 1 
                    FROM `nation` u2 
                    WHERE u2.population > u1.population) as ranking
                FROM `nation` u1
                ORDER BY population DESC;";
                $stmt = mysqli_stmt_init($ng);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: /NG/admanage.php?error=facrefstmtfail");
                    exit();
                }
                
                mysqli_stmt_execute($stmt);
                $q1 = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);

                while($nations[] = mysqli_fetch_assoc($q1));
                array_pop($nations);
            }

            print_r($nations);

            for ($i = 0; $i <= count($nations); $i++) {
                //echo($nations[$i]);
            }
        ?>
        </ul>
    </div>
</div>

<?php
    include_once "footer.php";
?>