<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "ng";

$ng = mysqli_connect($dbServername, $dbUsername, $dbPass, $dbName);

if (!$ng) {
    die("Connection Failed. " . mysqli_connect_error());
}