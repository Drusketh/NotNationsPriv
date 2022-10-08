<?php
    include_once 'header.php';
?>

<main class='gamecontent'>
    <?php
        if (isset($_SESSION['uid'])) {
            echo "
                <form class='bugform' action='includes/bugreport.inc.php' method='POST'>
                    <ul>
                        <li>
                            <input type='text' name='title' placeholder='Title'>
                        </li>
                        <li>
                            <input type='text' name='body' placeholder='Write a description, 1024 characters.'>
                        </li>
                        <li>
                            <input type='number' name='severity' placeholder='0-10' min='0' max='10'>
                        </li>
                        <li>
                            <button type='submit' name='submit'>Submit</button>
                        </li>
                    </ul>
                </form>
            ";
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyinput') {
                    echo "<p class='logerror'> Please fill all fields.</p>";
                }
                else if ($_GET['error'] == 'invaliduid') {
                    echo "<p class='logerror'>Please contact a moderator and inform them you have an invalid uid.</p>";
                }
                else if ($_GET['error'] == 'notitle') {
                    echo "<p class='logerror'>Please include a report title.</p>";
                }
                else if ($_GET['error'] == 'nobody') {
                    echo "<p class='logerror'>Please include a descriptor of the bug.</p>";
                }
                else if ($_GET['error'] == 'noseverity') {
                    echo "<p class='logerror'>Please input how severe you think this issue is.</p>";
                }
                else if ($_GET['error'] == 'stmtfail') {
                    echo "<p class='logerror'>Backend error. Please try again.</p>";
                }
            }
        }
        else {
            header('location: index.php');
            exit();
        }
    ?>
</main>

<?php
    include_once 'footer.php';
?>