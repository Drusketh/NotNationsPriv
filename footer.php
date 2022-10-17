
            
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
                    <div class='basic show' id='basic'>
                        <a class='basicres br-mn'>Money</a>
                        <a class='basicres br-fo'>Food</a>
                        <a class='basicres br-pw'>Power</a>
                        <a class='basicres br-bm'>Building Materials</a>
                        <a class='basicres br-cg'>Consumer Goods</a>
                        <a class='basicres br-fu'>Fuel</a>
                        <a class='basicres br-am'>Ammunition</a>
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
