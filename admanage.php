<?php
    include_once "header.php";
    include("includes/dbh.inc.php");
    include("includes/functions.inc.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<?php
    if (isset($_SESSION["uid"]) == false) {
        header("location: /NG/index.php", true);
        exit();
    }
    else {
        if (verifyUser($ng, $_SESSION["uid"], 1, 1) == false) {
            header("location: /NG/index.php", true);
            exit();
        }
        else {
            if ($_SESSION["ismod"] == 0) { 
                header("location: /NG/index.php", true);
                exit();
            }
            else {
                echo("
                    <div class='admanage-container'>
                        <div class='admanage-panel'>
                            <h3>Resource List</h3><br>
                            <div class='resourcelist'>
                                <ul>");
                                    $sql = "SELECT * FROM `resref`;";

                                    $stmt = mysqli_stmt_init($ng);
                                                                            
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("location: /NG/admanage.php?error=stmtfail");
                                        exit();
                                    }
                                                                            
                                    mysqli_stmt_execute($stmt);
                                
                                    $query = mysqli_stmt_get_result($stmt);
                                    
                                    mysqli_stmt_close($stmt);

                                    $resref = array();
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        echo("<li><img src='img/resources/".$row['name']."_icon.webp'>" . $row['name'] . "<li>");
                                    }
                            echo("</ul>
                            </div>
                        </div>
                        <div class='admanage-panel'>
                            <h3>Resource Creator</h3><br>
                            <div class=''>
                                <form class='resource' action='includes/mkres.inc.php' method='POST' enctype='multipart/form-data'>
                                    <ul>
                                        <li>
                                            <input type='text' name='name' placeholder='Resource Name'>
                                        </li>
                                        <li>
                                            <input type='file' name='icon' accept='image/png, image/jpeg, image/webp'>
                                        </li>
                                        <li>
                                            <button type='submit' name='submit' value='upload'>Create Resource</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                ");
            }
        }
    }
?>

        </div>  
    </body>
</html>

<?php
    ob_end_flush()
?>
