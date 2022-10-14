<?php
    include_once "header.php";

    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<section class="login">
    <script>
        $(".bg-image").css("min-height", "100vh");
    </script>
    <div class="login">
        <h2>Login</h2>

        <form class="loginform" action="includes/login.inc.php" method="POST">
            <ul>
                <li>
                    <input type="text" name="name" placeholder="Username/E-mail">
                </li>
                <li>
                    <input type="password" name="pass" placeholder="Password">
                </li>
                <li>
                    <button type="submit" name="submit">Log In</button>
                </li>
            </ul>
        </form>

        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p class='logerror'>Please fill all fields.</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p class='logerror'>Username/Email does not exist.</p>";
                }
                else if ($_GET["error"] == "wrongpass") {
                    echo "<p class='logerror'>Password is Incorrect</p>";
                }
            }
        ?>

        <a href="signup.php">Sign up</a>
    </div>
</section>


<?php
    include_once "footer.php";
?>