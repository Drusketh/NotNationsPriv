<?php
    include_once "header.php";
?>


    <div class="signup">
        <h2>Sign Up</h2>

        <form class="signinform" action="includes/signup.inc.php" method="POST">
            <ul>
                <li>
                    <input type="text" name="name" placeholder="Username">
                </li>
                <li>
                    <input type="text" name="email" placeholder="Email">
                </li>
                <li>
                    <input type="password" name="pass" placeholder="Password">
                </li>
                <li>
                    <input type="password" name="passv" placeholder="Verify Password">
                </li>
                <li>
                    <button type="submit" name="submit">Sign Up</button>
                </li>
            </ul>
        </form>
        
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p class='logerror'> Please fill all fields</p>";
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p class='logerror'>Username contains illegal characters. aA-zZ and 0-9 are permitted.</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p class='logerror'>Not a valid email format</p>";
                }
                else if ($_GET["error"] == "invalidpwd") {
                    echo "<p class='logerror'>Passwords do not match</p>";
                }
                else if ($_GET["error"] == "uidtaken") {
                    echo "<p class='logerror'>Username/Email in use.</p>";
                }
                else if ($_GET["error"] == "stmtfail") {
                    echo "<p class='logerror'>Backend error. Please try again.</p>";
                }
            }
        ?>
    </div>




<?php
    include_once "footer.php";
?>