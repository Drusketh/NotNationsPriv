<?php
    include_once "header.php";
?>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("includes/dbh.inc.php");
    include("includes/functions.inc.php");

    // echo "
        <div class='floatmenu' style='width:50%'>
            <div class='white'>
                <h3> Hello, I am Nathan Pollaro </h5>
                <br>
                <p>
                    I am a Sophomore currently enrolled in the Mechanical Engineering Technology program here at GCU. 
                    My job interests are pretty general; I'd like to work in a lot of places.
                </p>

                <ul>
                    <li>
                        Firstly, I really enjoy working on cars. I have a project car, a 1957 VW Beetle with a 
                        fiberglass body called a Sterling. It has been my main money and time drain for the past year and a half, 
                        and it has been worth it.
                    </li>
                    <li>
                        I would also be more than happy to work an engineering job, as long as the focus was on something I like.
                        Maybe automotive, who knows.
                    </li>
                    <li>
                        I'm also fairly competent with programming, this webpage is built on a template page for a php-nodejs webgame
                        I've been working on for about a year. I've been coding in different languages for about 8 years now.
                    </li>
                </ul>
            </div>
        </div>
        // ";
?>

<?php
    include_once "footer.php";
?>