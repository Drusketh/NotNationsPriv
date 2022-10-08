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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- <script src="js/p5.js"></script> -->
        <script src="js/sidebar.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <div id="mySidebar" class="sidebar">
            <a href="#">aaaaa</a>
            <a href="#">aaaaa</a>
            <a href="#">aaaaa</a>
            <a href="#">aaaaa</a>
        </div>

        <div id="page-container" class="page-container">
            <div class="header">
                <button class="openbtn" onclick="sideToggle()">&#9776; Open Menu</button>

                <div class="dropdown">
                    <button class="dropbtn" id="dropbtn" onClick="drop(this.id);">Menu</button>
                    <div class="dropdown-content" id="myDropdown">
                        <a href="profile.php">Profile</a>
                        <a href="index.php">Home</a>
                        <a href="login.php">Login</a>
                        <a href="/NG/includes/logout.inc.php">Logout</a>
                        <a href="bugreport.php">Report Bug</a>
                    </div>
                </div> 
            </div>

            <div class="bg-image"></div>