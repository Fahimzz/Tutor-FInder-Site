<!DOCTYPE HTML>
<html>
<title>Login</title>

<head>
    <link rel="stylesheet" href="css/style_Zahin.css">
</head>

<body>
    <?php
    require_once './model_z.php';
    session_start();
    $_SESSION["loggedin"] = true;
    $Name = $Address = $ProfilePic = $Email = $Phone = $SalaryStart = $SalaryEnd = $Gender = $InterestedLocation = $InterestedClass = $InterestedSubject = $UniversityName = $Salary = $CV = $Certificate = $Password = "";
    $errName = $errAddress = $errProfilePic = $errEmail = $errPhone = $errGender = $errInterestedLocation = $errInterestedClass = $errInterestedSubject = $errUniversityName = $errSalary = $errCV = $errCertificate = $errPassword = "";
    $Class1to5 = $Class6to8 = $Class9to10 = $CV = "";
    $Bangla = $English = $Chemistry = $Physics = $Math =  $Biology =  $errMsg = "";
    $Verified = "false";
    $counter = 0;
    //  echo $_COOKIE[$cookie_type];
    // $_SESSION["loggedin"] === "tutor";

    /* if ($_COOKIE[$cookie_type] == "admin") {
        $_SESSION["loggedin"] = "tutor";
        header("location: RankHistory.php");
        echo $_COOKIE[$cookie_type] . "aaaaaa";
        //exit;
    }

    /* if ($_SESSION["loggedin"] === "tutor") {
        header("location: tutorHome.php");
        exit;
    } else if ($_SESSION["loggedin"] === "admin") {
        header("location: RankHistory.php");
        exit;
    } else if ($_SESSION["loggedin"] === "parent") {
        //header("location: tutorHome.php");
        exit;
    }*/
    //echo $_SESSION["loggedin"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["Password"])) {
            $errPassword = "Password is required";
        } else {
            $Password = $_POST["Password"];
            $counter++;
        }
        if (empty($_POST["Email"])) {
            $errEmail = "Email is required";
        } elseif (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = "Invalid email format";
        } else {
            $Email = $_POST["Email"];
            $counter++;
        }


        $data['Password'] = $_POST['Password'];
        $data['Email'] = $_POST['Email'];
        $data['Type'] = $_POST['Type'];
        $data['Verify'] = "true";

        // if ($counter > 7) {
        if (checkLogin($data) != null) {
            $_SESSION["emailForUpdatePass"] = $_POST['Email'];
            $_SESSION["passForUpdatePass"] = $_POST['Password'];


            if ($_POST['Type'] == "tutor") {
                $_SESSION["loggedin"] = "tutor";
                $_SESSION['Email'] = $Email;
                header("Location:tutorHome.php");
                die;
            }
            ///////////////////////////////////////////////////////////

            elseif ($_POST['Type'] == "admin") {
                $_SESSION["loggedin"] = "admin";
                $_SESSION["typeF"] = "admin";
                $_SESSION['Email'] = $Email;

                $cookie_email = $_SESSION["emailForUpdatePass"];
                $cookie_pass =  $_SESSION["passForUpdatePass"];
                $cookie_type = "admin";
                setcookie($cookie_email, $cookie_pass, $cookie_type, time() + (86400 * 30), "/");
                //echo $cookie_type;
                header("Location:HomePageAdmin.php");
                die;
            } elseif ($_POST['Type'] == "moderator") {
                $_SESSION["loggedin"] = "admin";
                $_SESSION["typeF"] = "moderator";
                $_SESSION['Email'] = $Email;
                header("Location:HomePageAdmin.php");
                die;
            } elseif ($_POST['Type'] == "parent") {
                $_SESSION["loggedin"] = "parent";
                $_SESSION['Email'] = $Email;
                header("Location: Welcomeparent.php");
                die;
            }
        } else {
            $errMsg = "Email or Password is Wrong or may be you are not Verified yet!";
        }
        //}
    }

    ?>

    <?php include 'header1.html'; ?>

    <form id="formLogin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>
                    Type
                </td>
                <td>
                    <select name="Type" id="Type">
                        <option name="Admin">admin</option>
                        <option name="Moderator">moderator</option>
                        <option name="Tutor">tutor</option>
                        <option name="Parent">parent</option>
                    </select>
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="text" name="Email" value=<?php echo $Email ?>>
                    <span class="errorLogin">* <?php echo $errEmail; ?></span>
                </td>

            </tr>
            <br><br>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" id="myInput" name="Password" value=<?php echo $Password ?>>
                    <span class="errorLogin">* <?php echo $errPassword; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>

                </td>
                <td>
                    <span style="font-size:15px"><input type="checkbox" onclick="myFunction()">Show Password</span>
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                </td>
            </tr>
        </table>
        <br>

        <span class="errorLogin"><?php echo $errMsg; ?></span>
        <br>
        <br>
        <button type="submit" class="buttonLogin button2Login" name="submit" value="submit" class="submit">Login</button>
    </form>

</body>
<?php include 'footer.php'; ?>

</html>