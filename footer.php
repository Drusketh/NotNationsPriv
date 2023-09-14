        <?php
        if (isset($_SESSION["uid"])) {
            if (verifyUser($ng, $_SESSION["uid"], 0, 0) == true) {
                if ($_SESSION["hasnation"] == 1) {
                    echo("
                        <div class='footer'>
                            <div class='dropdown' id='resswitch' style='left: 0.5rem; right: auto; position: auto;'>
                                <button class='dropbtn' id='resbtn' onClick='drop(this.id);'>v</button>
                                <div class='dropdown-content' id='reslist' style='left: 0.5rem; right: auto; bottom: 100%;'>
                                    <a class='rsbasic'>Basic</a> <!--resswitch = rs -->
                                    <a class='rsflora'>Flora</a>
                                </div>
                            </div> 
                            <div class='resholder' id='resholder'>
                                <div class='basic show' id='basic'>");
                        //
                        // RETREIVE RESOURCES, SAVE TO $resources
                        //

                        $rsql = "SELECT `resources` FROM `nation` where uid = ?;";
                        $rstmt = mysqli_stmt_init($ng);
                                                                
                        if (!mysqli_stmt_prepare($rstmt, $rsql)) {
                            header("location: /NG/admanage.php?error=stmtfail");
                            exit();
                        }
                                                    
                        mysqli_stmt_bind_param($rstmt, "i", $_SESSION["uid"]);
                        mysqli_stmt_execute($rstmt);
                        $resources = json_decode(mysqli_fetch_assoc(mysqli_stmt_get_result($rstmt))['resources'], true);
                        $_SESSION["resources"] = $resources;
                        print_r($resources);
                        mysqli_stmt_close($rstmt);

                        //
                        // RETREIVE ALL REFERENCE RESOURCES FROM MYSQL
                        //

                        $sql = "SELECT * FROM `resref`;";
                        $stmt = mysqli_stmt_init($ng);
                                                                
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("location: /NG/admanage.php?error=stmtfail");
                            exit();
                        }
                                                                
                        mysqli_stmt_execute($stmt);
                        $query = mysqli_stmt_get_result($stmt);
                        mysqli_stmt_close($stmt);

                        $_SESSION["imgref"] = array();

                        while ($row = mysqli_fetch_assoc($query)) {
                            $path = "img/resources/".$row['name']."_icon.webp";
                            array_push($_SESSION["imgref"], $_SESSION["resources"][$row['name']]);
                            $_SESSION["imgref"][$row['name']] = $path;
                            echo("<a class='basicres'><img src='img/resources/".$row['name']."_icon.webp'>  ". $_SESSION["resources"][$row['name']] ."      </a>");
                        }
                        echo("
                        <form action='includes/update.inc.php' method='get'>
                            <input type='submit' value='inc'>
                        </form>
                    </div>

                    <div class='flora' id='flora'>
                        <a class='florares br-mn'>dog</a>
                        <a class='florares br-fo'>cow</a>
                        <a class='florares br-pw'>eagle</a>
                        <a class='florares br-bm'>capy blappy</a>
                        <a class='florares br-cg'>egg</a>
                        <a class='florares br-fu'>horse</a>
                        <a class='florares br-am'>donkey</a>
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
