function update {
    $sql = "SELECT * FROM nation WHERE name = ?;";
    $stmt = mysqli_stmt_init($ng);
        
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /NG/index.php?error=stmtfail");
        exit();
    }
        
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    
    $resultdata = mysqli_stmt_get_result($stmt);
}