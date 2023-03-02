<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function emptyInputSignup($name, $email, $pass, $passv) {
    $result;
    if (empty($name) || empty($email) || empty($pass) || empty($passv)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUname($name) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passMatch($pass, $passv) {
    $result;
    if ($pass !== $passv) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($ng, $name, $email) {
    $sql = "SELECT * FROM user WHERE name = ? OR email = ?;";
    $stmt = mysqli_stmt_init($ng);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /NG/signup.php?error=stmtfail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    }
    else { 
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($ng, $name, $email, $pass, $curtime) {
    $sql = "INSERT INTO user (name, email, pass, crtime, ltime, hasnation, ismod) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($ng);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /NG/signup.php?error=stmtfail");
        exit();
    }

    $hashpass = password_hash($pass, PASSWORD_DEFAULT);
    $zero = 0;

    mysqli_stmt_bind_param($stmt, "sssiiii", $name, $email, $hashpass, $curtime, $curtime, $zero, $zero);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: /NG/login.php?error=success");
    exit();
}

// Log In Functions

function testecho(){
    $ret = "test";
    return true;
}

function emptyInputLogin($name, $pass) {
    $result;
    if (empty($name) || empty($pass)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

function loginUser($ng, $name, $pass) {
    $userExists = uidExists($ng, $name, $name);
    $ptoken = substr(str_shuffle(MD5(microtime())), 0, 32);

    if ($userExists === false) {
        header("location: /NG/login.php?error=wronglogin", true);
        exit();
    }

    $sql = "UPDATE `user` SET `ptoken` = ? WHERE `user`.`uid` = ?;";
    $stmt = mysqli_stmt_init($ng);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /NG/index.php?error=stmtfail");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $ptoken, $userExists["uid"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $hashpass = $userExists["pass"];
    $checkpass = password_verify($_POST["pass"], $hashpass);

    if ($checkpass === false) {
        header("location: /NG/login.php?error=wrongpass", true);
        exit();
    }
    else {
        $sql = "SELECT * FROM nation WHERE uid = ?;";
        $stmt = mysqli_stmt_init($ng);
            
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: /NG/index.php?error=stmtfail");
            exit();
        }
            
        mysqli_stmt_bind_param($stmt, "s", $userExists["uid"]);
        mysqli_stmt_execute($stmt);
        
        $nation = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        
        mysqli_stmt_close($stmt);


        session_start();
        $_SESSION["uid"]        = $userExists["uid"];
        $_SESSION["name"]       = $userExists["name"];
        $_SESSION["email"]      = $userExists["email"];
        $_SESSION["ip"]         = 0;
        $_SESSION["pt"]         = $ptoken;
        $_SESSION["hasnation"]  = $userExists["hasnation"];
        $_SESSION["ismod"]      = $userExists["ismod"];

        $_SESSION["nname"]      = $nation["name"];
        $_SESSION["population"] = $nation["population"];
        $_SESSION["tier"]       = $nation["tier"];

        header("location: /NG/index.php", true);
        exit();
    }
}

function verifyUser($ng, $uid, $hasnation, $ismod) {
    $sql = "SELECT * FROM `user` WHERE uid = ?;";
    $stmt = mysqli_stmt_init($ng);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /NG/index.php?error=stmtfail"); // Error displaying backend data retrieval error
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result()->fetch_assoc(); // get the mysqli result
    mysqli_stmt_close($stmt);
    
    if ($result["ptoken"] == $_SESSION["pt"] && $result["uid"] == $_SESSION["uid"] && $result["name"] == $_SESSION["name"]) {
        return true;
    }
    else {
        return false;
    }
}

// Nation Creation functions

function emptyInputNation($name, $capitol, $govt, $econ, $biome) {
    $result;
    if (empty($name) || empty($capitol) || empty($govt) || empty($econ) || empty($biome)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidNC($name, $capitol) {
    $result;
    // if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
    //     if (!preg_match("/^[a-zA-Z0-9]*$/", $capitol)) {
    //         $result = true;
    //     }
    //     else {
    //         $result = false;
    //     }
    // }
    // else {
        $result = false;
    // }
    return $result;
}

function invalidInput($name, $capitol, $govt, $econ, $biome) {
    $result;
    
    $result = false;

    return $result;
}

function nationExists($ng, $name) {
    $sql = "SELECT * FROM nation WHERE name = ?;";
    $stmt = mysqli_stmt_init($ng);
        
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /NG/index.php?error=stmtfail");
        exit();
    }
        
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    
    $resultdata = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    }
    else { 
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}

function createNation($ng, $uid, $name, $capitol, $biome, $govt, $econ, $curtime) {
    $basepop = 50000;
    $basetier = 1;
    $nsql = "INSERT INTO nation (uid, name, capitol, biome, government, econ, crtime, population, tier) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($ng);

    if (!mysqli_stmt_prepare($stmt, $nsql)) {
        header("location: /NG/index.php?error=stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "isssiiiii", $uid, $name, $capitol, $biome, $govt, $econ, $curtime, $basepop, $basetier);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    $hasnation = 1;
    $usql = "UPDATE `user` SET `hasnation` = ? WHERE `user`.`uid` = ?;";
    $stmt2 = mysqli_stmt_init($ng);
    
    if (!mysqli_stmt_prepare($stmt2, $usql)) {
        header("location: /NG/index.php?error=stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt2, "ii", $hasnation, $uid);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);

    $basemoney = 5000;
    $basepower = 1000;
    $basefood = 1000;
    $basebm = 100;
    $basecg = 0;
    $basemetal = 0;
    $basefuel = 0;
    $baseammo = 0;

    $rsql = "INSERT INTO resources (uid, money, food, power, bm, cg, metal, fuel, ammunition) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt3 = mysqli_stmt_init($ng);

    if (!mysqli_stmt_prepare($stmt3, $rsql)) {
        header("location: /NG/index.php?error=stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt3, "iiiiiiiii", $uid, $basemoney, $basefood, $basepower, $basebm, $basecg, $basemetal, $basefuel, $baseammo);
    mysqli_stmt_execute($stmt3);
    mysqli_stmt_close($stmt3);

    $_SESSION["nname"] = $name;
    $_SESSION["population"] = 50000;
    $_SESSION["hasnation"] = 1;

    header("location: /NG/nation.php");
    exit();
}

function makeResource($ng, $name, $icon) {
    $sql = "INSERT INTO resref (name, icon) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($ng);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /NG/index.php?error=stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $icon);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

?>