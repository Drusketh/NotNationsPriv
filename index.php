<?php
    include_once "header.php";
?>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("includes/dbh.inc.php");
    include("includes/functions.inc.php");

    if (isset($_SESSION["uid"])) {
        if (verifyUser($ng, $_SESSION["uid"], 0, 0) == true) {
            if ($_SESSION["hasnation"] == 0) { //Nation Creation
                echo "
                    <div class='floatmenu'>
                        <div class='white'>
                            <form class='nform' action='includes/createnation.inc.php' method='POST'>
                                <div class='tab'>
                                    <p>Basic info:</p>
                                    <input class='text' type='text' name='nname' placeholder='Nation Name' oninput='this.className = '''><br>
                                    <input class='text' type='text' name='ncapitol' placeholder='Nation Capital' oninput='this.className = '''>
                                </div>

                                <div class='tab'>
                                <p>Government Type:</p>
                                    <label><input class='radio' type='radio' name='govt' value='1'>Dictatorship</label><br>
                                    <label><input class='radio' type='radio' name='govt' value='2'>Communist</label><br>
                                    <label><input class='radio' type='radio' name='govt' value='3'>Socialist</label><br>
                                    <label><input class='radio' type='radio' name='govt' value='4'>Democracy</label><br>
                                    <label><input class='radio' type='radio' name='govt' value='5'>Theocracy</label><br>
                                    <label><input class='radio' type='radio' name='govt' value='6'>Monarchy</label><br>
                                </div>

                                <div class='tab'>
                                    <p>Economy Type:</p>
                                    <label><input class='radio' type='radio' name='econ' value='1'>Free Market Capitalism</label><br>
                                    <label><input class='radio' type='radio' name='econ' value='2'>State Capitalism</label><br>
                                    <label><input class='radio' type='radio' name='econ' value='3'>Communist</label><br>
                                    <label><input class='radio' type='radio' name='econ' value='4'>Socialist</label><br>
                                </div>

                                <div class='tab'>
                                    <p>Biome:</p>
                                    <label><input class='radio' type='radio' name='biome' onclick='chngback(this);' value='1'>Temperate Forest</label><br>
                                    <label><input class='radio' type='radio' name='biome' onclick='chngback(this);' value='2'>Desert</label><br>
                                    <label><input class='radio' type='radio' name='biome' onclick='chngback(this);' value='3'>Grasslands</label><br>
                                    <label><input class='radio' type='radio' name='biome' onclick='chngback(this);' value='4'>Tropical Forest</label><br>
                                    <label><input class='radio' type='radio' name='biome' onclick='chngback(this);' value='5'>Tundra</label><br>
                                </div>
                                
                                <div style='overflow:auto;'>
                                    <div style='float:right;'>
                                        <button type='button' id='prevBtn' onclick='nextPrev(-1)'>Previous</button>
                                        <button type='button' id='nextBtn' onclick='nextPrev(1)'>Next</button>
                                        <button type='submit' name='submit' id='submitBtn'>Submit</button>
                                        <input  type='text' name ='uid' value='{$_SESSION['uid']}' id='invis'>
                                    </div>
                                </div>

                                <div style='text-align:center;margin-top:40px;'>
                                    <span class='step'></span>
                                    <span class='step'></span>
                                    <span class='step'></span>
                                    <span class='step'></span>
                                </div>
                            </form>
                            <script src='js/forms.js'></script>
                        </div>
                    </div>
                ";
            }
            else { // Nation Page
                header("location: nation.php");
                exit();
            }
        }
        else {
            echo "Please log out and log back in, or stop messing with environment variables.";
        }
    }
    else {
        header("location: /NG/login.php");
        exit();
        // echo "
        //     <script>
        //         $('.bg-image').css('min-height', '100vh');
        //     </script>

        //     <main class='gamecontent'>
                
        //     </main>
        // ";
    }
?>

<?php
    include_once "footer.php";
?>