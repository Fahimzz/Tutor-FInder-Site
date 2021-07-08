<?php
session_start();


//$_SESSION["loggedin"] !== "tutor";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "admin") {
    header("location: LoginTutor.php");
    exit;
}
?>


<!DOCTYPE HTML>
<html>


<head>
    <link rel="stylesheet" href="css/style_Zahin.css">
    <style>
        .topnav a.registration {
            background-color: #008CBA;
            color: white;
        }

        .error {
            font-size: 14px;
        }

        #Type {
            width: 180px;
        }
    </style>

    <script src="js/script.js"></script>
</head>

<body>
    <?php
    require_once './model_z.php';
    include 'headerAdmin.html';
    $Name = $Address = $ProfilePic = $Email = $Phone = $SalaryStart = $SalaryEnd = $Gender = $InterestedLocation = $InterestedClass = $InterestedSubject = $UniversityName = $Salary = $CV = $Certificate = $Password = "";
    $errName = $errAddress = $errProfilePic = $errEmail = $errPhone = $errGender = $errInterestedLocation = $errInterestedClass = $errInterestedSubject = $errUniversityName = $errSalary = $errCV = $errCertificate = $errPassword = "";
    $Class1to5 = $Class6to8 = $Class9to10 = $CV = $tUsername = $Type = "";
    $Bangla = $English = $Chemistry = $Physics = $Math =  $Biology = $CV = $errUsername = "";
    $Verified = "false";
    $upload = "img.png";
    $u = 0;
    $msg = "";
    $counter = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["Name"])) {
            $errName = "Name is required";
        } else {
            $Name = $_POST["Name"];
            $counter++;
        }
        $data2['Password'] = $_POST["Password"];
        if (empty($_POST["Password"])) {
            $errPassword = "Password is required";
        } elseif (checkPass($data2) != null) {
            $errPassword = "Password  Already Used";
        } else {
            $Password = $_POST["Password"];
            $counter++;
        }

        $data1['Email'] = $_POST["Email"];
        if (empty($_POST["Email"])) {
            $errEmail = "Email is required";
        } elseif (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = "Invalid email format";
        } elseif (checkEmail($data1) != null) {
            $errEmail = "Email is Already Sign Up";
        } else {
            $email = $_POST["Email"];
            $counter++;
        }


        $data1['tUsername'] = $_POST["tUsername"];
        if (empty($_POST["tUsername"])) {
            $errUsername = "Username is required";
        } elseif (checkUsername($data1) != null) {
            $errUsername = "Username is Already Sign Up";
        } else {
            $tUsername = $_POST["tUsername"];
            $counter++;
        }

        /*if (empty($_POST["Address"]) || $_POST["Address"] == 'Option') {
            $errAddress = "Address is required";
            $Address = test_input($_POST["Address"]);
        } else {
            $Address = $_POST["Address"];
            $counter++;
        }*/

        if (empty($_POST["Phone"])) {
            $errPhone = "Phone is required";
        } else {
            $Phone = $_POST["Phone"];
            $counter++;
        }

        if (empty($_POST["female"]) && empty($_POST["male"])) {
            $errGender = "Gender is required";
        } elseif (isset($_POST["female"]) && isset($_POST["male"])) {
            $errGender = "You Hav to Chose one";
        } else {
            if (isset($_POST["female"])) {
                $Gender = "Female";
                $data['Gender'] = "Female";
            } elseif (isset($_POST["male"])) {
                $Gender = $data['Gender'] = "Male";
            }
            $counter++;
        }


        $Type = $_POST["Type"];
        if (empty($_POST["Type"])) {
            $errInterestedLocation = "Type Location is required";
        } else {
            $data['Type'] = $_POST["Type"];
            $counter++;
        }


        if (empty($_POST["SalaryStart"])) {
            $errSalary = "both Salary is required";
        } else {
            $SalaryStart = $_POST["SalaryStart"];
            $counter++;
        }


        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Profile Pic--------------------------------------------------------------

        $data['Name'] = $_POST['Name'];
        $data['tUsername'] = $_POST['tUsername'];
        $data['Password'] = $_POST['Password'];
        //$data['Address'] = $_POST['Address'];
        $data['Email'] = $_POST['Email'];
        $data['Phone'] = $_POST['Phone'];
        // $data['SalaryStart'] = $_POST['SalaryStart'];
        // $data['SalaryEnd'] = $_POST['SalaryEnd'];
        $data['Salary'] = $_POST['SalaryStart'];
        $data['Verify'] = "true";


        //$data['ProfilePic'] = "a";

        // echo $counter;
        if ($_SESSION["typeF"] == "moderator") {
            echo '<script>alert("Sorry! You have No Access to this Option!")</script>';
        } else {
            if ($counter == 8) {
                if (addAdmin($data)) {
                    echo 'Successfully added!!';
                    // header("Location: workDone.php");
                    exit();
                } else {
                    echo 'You are not allowed to access this page.';
                }
            }
        }
    }
    ?>



    <h2 class="header"><u>Registation For Admin/Moderator</u> </h2>
    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <table>
            <br>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input type="text" id="myInput" name="Name" value=<?php echo $Name ?>>
                    <span class="error">* <?php echo $errName; ?></span>
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    Username
                </td>
                <td>
                    <input type="text" id="myInput" name="tUsername" value=<?php echo $tUsername ?>>
                    <span class="error">* <?php echo $errUsername; ?></span>
                </td>

            </tr>
            <br>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="text" id="myInput" name="Email" value=<?php echo $Email ?>>
                    <span class="error">* <?php echo $errEmail; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" id="myInput" name="Password" value=<?php echo $Password ?>>
                    <span class="error">* <?php echo $errPassword; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Phone(+88)
                    <br>
                    <br>
                </td>
                <td>
                    <input type="text" name="Phone" value=<?php echo $Phone ?>>
                    <span class="error">* <?php echo $errPhone; ?></span>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    Gender
                </td>
                <td>
                    <div id="gender">
                        <input type="radio" id="" name="female" <?php echo (isset($_POST['female']) == 'checked') ?  'checked' : ''; ?>>Female
                        <input type="radio" id="" name="male" <?php echo (isset($_POST['male']) == 'checked') ?  'checked' : ''; ?>>Male
                        <span class="error">* <?php echo $errGender; ?></span>
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                    Type
                </td>
                <td>
                    <select name="Type" id="Type">
                        <option name="Option">Choose Option</option>
                        <option name="Type" <?php if ($Type == 'admin') { ?>selected="true" <?php }; ?>>admin</option>
                        <option name="Type" <?php if ($Type == 'moderator') { ?>selected="true" <?php }; ?>>moderator</option>
                    </select>
                    <span class="error">* <?php echo $errInterestedLocation; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    Salary
                </td>
                <td>
                    <br>
                    <input type="number" id=" salaryInput" min="0" max="999999" name="SalaryStart" value=<?php echo $SalaryStart ?>>
                    <span class="error">* <?php echo $errSalary; ?></span>
                    <br>
                    <br>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <button type="submit" class="buttonReg button2Reg" name="button" value="submit" class="button">Sign UP</button>
    </form>

</body>
<?php include 'footer.php'; ?>

</html>