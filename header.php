<?php
    ob_start();
    session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>NG</title>
        <link rel="icon" href="img/N3.png" type="image/x-icon">

        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="stylesheet" href="css/dropdown.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Old+Permic&display=swap" rel="stylesheet">
                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- <script src="js/p5.js"></script> -->
        <script src="js/sidebar.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <div id="mySidebar" class="sidebar">
            <h1>Nations</h1>
            <a href="nation.php">Home</a>
            <a href="factories.php">Factories</a>
            <a href="construct.php">Construct</a>
        </div>

        <div id="page-container" class="page-container">
            <div class="header">
                <button class="openbtn" onclick="sideToggle()">&#9776;</button>

                <div class="dropdown">
                    <button class="dropbtn" id="dropbtn" onClick="drop(this.id);">Menu</button>
                    <div class="dropdown-content" id="myDropdown">
                        <a href="profile.php">Profile</a>
                        <a href="index.php">Home</a>
                        <a href="login.php">Login</a>
                        <a href="/NG/includes/logout.inc.php">Logout</a>
                        <a href="bugreport.php">Report Bug</a>
                        <?php
                            if (isset($_SESSION["uid"])) {
                                if ($_SESSION["ismod"] == 1) {
                                    echo("<a href='admanage.php'>Admin Panel</a>");
                                }
                            }
                        ?>
                    </div>
                </div> 
            </div>

            <div class="bg-image"></div>
            <div class="spacer"></div>