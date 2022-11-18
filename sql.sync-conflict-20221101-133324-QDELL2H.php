<?php
require_once "header.php";
require_once "includes/dbh.inc.php";
require_once "includes/functions.inc.php";

$fac = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ng' AND TABLE_NAME = 'nation';";
$facstmt = mysqli_stmt_init($ng);

if (!mysqli_stmt_prepare($facstmt, $fac)) {
    header("location: ../index.php?error=holyshitwtf");
    exit();
};

mysqli_stmt_execute($facstmt);
$res = mysqli_stmt_get_result($facstmt);
mysqli_stmt_close($facstmt);

$columns = mysqli_fetch_array($res, MYSQLI_ASSOC);

echo(json_encode($columns));

require_once "footer.php";

?>