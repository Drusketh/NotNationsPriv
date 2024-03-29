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
                        <script src='js/mkfac.js'></script>
                        <div class='admanage-panel resource-list'>
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

                                    $resources[] = array();
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        array_push($resources, $row);
                                        echo("<li><img src='img/resources/".$row['name']."_icon.webp'>" . $row['name'] . "<li>");
                                    }
                                    \array_splice($resources, 0, 1);
                            echo("</ul>
                            </div>
                        </div>
                        <div class='admanage-panel resource-maker'>
                            <h3>Resource Creator</h3><br>
                            <div class=''>
                                <form class='resource' action='includes/mkres.inc.php' method='POST' enctype='multipart/form-data'>
                                    <ul>
                                        <li>
                                            <input class='text' type='text' name='name' placeholder='Resource Name'>
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
                        <div class='admanage-panel'>
                            <h3>BLANK</h3><br>
                            <div class=''>
                            </div>
                        </div>
                        <div class='admanage-panel factory-list'>
                            <h3>Factory List</h3><br>
                            <div class='factorylist'>
                                <ul>");
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
                                        echo("<li><img src='img/factories/".$row['icon']."'>" . $row['name'] . "<li>");
                                    }
                            echo("</ul>
                            </div>
                        </div>
                        <div class='admanage-panel factory-maker'>
                            <h3>Factory Creator</h3><br>
                            <div class='factorylist'>
                                <form class='resource' action='includes/mkfac.inc.php' method='POST' enctype='multipart/form-data'>
                                    <ul>
                                        <li>
                                            <input class='text' type='text' name='name' placeholder='Factory Name'>
                                        </li>

                                        <li>
                                            <input class='text' type='number' name='level' placeholder='maxfaclevel'>
                                        </li>

                                        <p>cost</p>

                                        <li>
                                            <div class='input_fields_wrap'>
                                                <select class='form-control' name='cost'>
                                                    ");
                                                    foreach($resources as &$v) {
                                                        echo("<option value='" . $v['name'] . "'>" . $v['name'] . "</option>");
                                                    }
                                                    echo("
                                                </select>
                                                <input class='form-number' type='number' name='ccount' placeholder='count'>
                                                <button type='button' class='remove_field'>Remove</button>
                                            </div>

                                            <button class='add_field_button 1' type='button'>Add New Field &nbsp; <span style='font-size:16px; font-weight:bold;'>+ </span></button>
                                        </li>
                                        
                                        

                                        <p>input</p>
                                        
                                        <li>
                                            <div class='input_fields_wrap'>
                                                <select class='form-control' name='input'>
                                                    ");
                                                    foreach($resources as &$v) {
                                                        echo("<option value='" . $v['name'] . "'>" . $v['name'] . "</option>");
                                                    }
                                                    echo("
                                                </select><input class='form-number' type='number' name='icount' placeholder='count'>
                                                <button type='button' class='remove_field'>Remove</button>
                                            </div>

                                            <button class='add_field_button 2' type='button'>Add New Field &nbsp; <span style='font-size:16px; font-weight:bold;'>+ </span></button>
                                        </li>



                                        <p>output</p>
                                        
                                        <li>
                                            <div class='input_fields_wrap'>
                                                <select class='form-control' name='output'>
                                                    ");
                                                    foreach($resources as &$v) {
                                                        echo("<option value='" . $v['name'] . "'>" . $v['name'] . "</option>");
                                                    }
                                                    echo("
                                                </select><input class='form-number' type='number' name='ocount' placeholder='count'>
                                                <button type='button' class='remove_field'>Remove</button>
                                            </div>

                                            <button class='add_field_button 3' type='button'>Add New Field &nbsp; <span style='font-size:16px; font-weight:bold;'>+ </span></button>
                                        </li>

                                        <li>
                                            <input type='file' name='icon' accept='image/png, image/jpeg, image/webp'>
                                        </li>
                                        <li>
                                            <button type='submit' name='submit' value='upload'>Create Factory</button>
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