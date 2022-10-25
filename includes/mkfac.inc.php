<?php
session_start();

if (isset($_POST["submit"])) {
    $uid = $_SESSION["uid"];
    $name = $_POST["name"];
<<<<<<< Updated upstream
    $body = $_POST["cost"];
    $sev = $_POST["costct"];
=======
    $cost = $_POST["name"];
    $input1 = $_POST["i1"];
    $input1ct = $_POST["i1ct"];
    $input2 = $_POST["i2"];
    $input2ct = $_POST["i2ct"];
    $input3 = $_POST["i3"];
    $input3ct = $_POST["i3ct"];
    $input4 = $_POST["i4"];
    $input4ct = $_POST["i4ct"];
    // $input5 = $_POST["i5"];
    // $input5ct = $_POST["i5ct"];
    $output1 = $_POST["o1"];
    $output1ct = $_POST["o1ct"];
    $output2 = $_POST["o2"];
    $output2ct = $_POST["o2ct"];
>>>>>>> Stashed changes
    $time = time();

    // <form class='facform' action='includes/makefactory.inc.php' method='POST'>
    //     <ul>
    //         <li>
    //             <input type='text' name='name' placeholder='Name'>
    //         </li>
    //         <li>
    //             <p>Build Cost</p>
    //             <input type="text" name="cost" placeholder='cost'><input type="text" name="costct" placeholder='count'><br>
    //         </li>
    //         <li>
    //             <p>Collection</p>
    //             <input type="text" name="i1" placeholder='input1'><input type="text" name="i1ct" placeholder='count'><br>
    //             <input type="text" name="i2" placeholder='input2'><input type="text" name="i2ct" placeholder='count'><br>
    //             <input type="text" name="i3" placeholder='input3'><input type="text" name="i3ct" placeholder='count'><br>
    //             <input type="text" name="i4" placeholder='input4'><input type="text" name="i4ct" placeholder='count'><br>
    //             <input type="text" name="o1" placeholder='output1'><input type="text" name="o1ct" placeholder='count'><br>
    //             <input type="text" name="o1" placeholder='output2'><input type="text" name="o2ct" placeholder='count'>
    //         </li>
    //         <li>
    //             <button type='submit' name='submit'>Submit</button>
    //         </li>
    //     </ul>
    // </form>


    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    for ($x = 0; $x <= 999; $x++) {
        $sql = "INSERT INTO factest1 (a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, r, s, t, u, v, w, x, y, z, a1, b1, c1, d1, e1, f1, g1, h1, i1, j1, k1, l1, m1, n1, o1, p1, r1, s1, t1, u1, v1, w1, x1, y1, z1, a2, b2, c2, d2, e2, f2, g2, h2, i2, j2, k2, l2, m2, n2, o2, p2, r2, s2, t2, u2, v2, w2, x2, y2, z2) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0 , 0);";
        $stmt = mysqli_stmt_init($ng);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: /NG/index.php?error=stmtfail");
            exit();
        }

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // if (emptyInputBug($uid, $name, $body, $sev) !== false) {
    //     header("location: ../signup.php?error=emptyinput");
    //     exit();
    // }
    // if (invalidUid($uid) !== false) {
    //     header("location: ../signup.php?error=invaliduid");
    //     exit();
    // }
    // if (noTitle($email) !== false) {
    //     header("location: ../signup.php?error=invalidemail");
    //     exit();
    // }
    // if (noBody($pass, $passv) !== false) {
    //     header("location: ../signup.php?error=invalidpwd");
    //     exit();
    // }
    // if (noSeverity($ng, $name, $email) !== false) {
    //     header("location: ../signup.php?error=uidtaken");
    //     exit();
    // }

    // createUser($ng, $name, $email, $pass, $curtime);
}
else {
    header("location: ../signup.php");
    exit();
}