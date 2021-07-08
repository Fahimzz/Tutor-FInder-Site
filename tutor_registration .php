<!DOCTYPE HTML>
<html>

<title>Registration(TUTOR)</title>

<head>
    <link rel="stylesheet" type="text/css" href="css/style_Zahin.css?version=1">
    <script src="js/script.js"></script>
</head>

<body>
    <?php
    require_once './model_z.php';
    include 'header1.html';
    session_start();
    $Name = $Address = $ProfilePic = $Email = $Phone = $SalaryStart = $SalaryEnd = $Gender = $InterestedLocation = $InterestedClass = $InterestedSubject = $UniversityName = $Salary = $CV = $Certificate = $Password = "";
    $errName = $errAddress = $errProfilePic = $errEmail = $errPhone = $errGender = $errInterestedLocation = $errInterestedClass = $errInterestedSubject = $errUniversityName = $errSalary = $errCV = $errCertificate = $errPassword = "";
    $Class1to5 = $Class6to8 = $Class9to10 = $CV = $tUsername = $msg2 = "";
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

        $data['Subject'] = null;
        if (empty($_POST["Bangla"]) && empty($_POST["English"]) && empty($_POST["Chemistry"]) && empty($_POST["Physics"]) && empty($_POST["Math"]) && empty($_POST["Biology"])) {
            $errInterestedSubject = "Interested Subject is required";
        } else {
            $counter++;
            $data['Bangla'] = $data['English'] = $data['Chemistry'] = $data['Physics'] = $data['Math'] =  $data['Biology'] = "no";
            if (isset($_POST["Bangla"])) {
                $data['Bangla'] = "yes";
                $data['Subject'] = $data['Subject'] .  "Bangla";
                $Bangla = "yes";
            }
            if (isset($_POST["English"])) {
                $English = "yes";
                $data['Subject'] = $data['Subject'] . "," . "English";
                $data['English'] = "yes";
            }
            if (isset($_POST["Chemistry"])) {
                $Chemistry = "yes";
                $data['Subject'] = $data['Subject'] . "," . "Chemistry";
                $data['Chemistry'] = "yes";
            }

            if (isset($_POST["Physics"])) {
                $Physics = "yes";
                $data['Subject'] = $data['Subject'] . "," . "Physics";
                $data['Physics'] = "yes";
            }
            if (isset($_POST["Math"])) {
                $Math = "yes";
                $data['Subject'] = $data['Subject'] . "," . "Math";
                $data['Math'] = "yes";
            }
            if (isset($_POST["Biology"])) {
                $Biology = "yes";
                $data['Subject'] = $data['Subject'] . "," . "Biology";
                $data['Biology'] = "yes";
            }
        }

        if (empty($_POST["InterestedLocation"])) {
            $errInterestedLocation = "Interested Location is required";
        } else {
            $counter++;
        }

        $data['Level'] = null;
        if (empty($_POST["class1to5"]) && empty($_POST["class6to8"]) && empty($_POST["class9to10"])) {
            $errInterestedClass = "Class is required";
        } else {
            $counter++;
            if (isset($_POST["class1to5"])) {
                $data['Class1to5'] = "yes";
                $data['Level'] = $data['Level']  . "class1to5";
            }
            if (isset($_POST["class6to8"])) {
                $data['Class6to8'] = "yes";
                $data['Level'] = $data['Level'] . "," . "Class6to8";
            }
            if (isset($_POST["class9to10"])) {
                $data['Class9to10'] = "yes";
                $data['Level'] = $data['Level'] . "," . "Class9to10";
            }
        }

        if (empty($_POST["SalaryStart"]) && empty($_POST["SalaryEnd"])) {
            $errSalary = "both Salary is required";
        } elseif ($_POST["SalaryStart"] > $_POST["SalaryEnd"]) {
            $errSalary = " Start Salary should me less then End Salary";
        } else {
            $SalaryStart = $_POST["SalaryStart"];
            $SalaryEnd = $_POST["SalaryEnd"];
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



        if (basename($_FILES["fileToUpload"]["name"]) != null) {
            $_SESSION["ProPic"] = basename($_FILES["fileToUpload"]["name"]);
        }
        $data['ProfilePic'] = $_SESSION["ProPic"];

        // echo  $_SESSION["ProPic"];
        if ($data['ProfilePic'] != null) {
            $counter++;
        }

        $target_dir = "ProPic/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $msg = "";

        // Check if image file is a actual image or fake image
        /*if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $msg =  "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $msg =  "File is not an image.";
                $uploadOk = 0;
            }
        }*/

        // Check if file already exists
        if (file_exists($target_file)) {
            $msg =  "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $msg =  "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        $upload = "img.png";
        if ($uploadOk == 0) {
            $msg =  "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $msg =  "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                $upload = basename($_FILES["fileToUpload"]["name"]);
            } else {
                $msg =  "Sorry, there was an error uploading your file.";
            }
        }

        if ($_SESSION["ProPic"] == "img.png") {
            $msg = "Profile Picture not Uploaded";
        }


        //--------------------------OtherFile

        $errors = array();
        $file_ext = null;
        $file_name = $_FILES['CV']['name'];
        $file_size = $_FILES['CV']['size'];
        $file_tmp = $_FILES['CV']['tmp_name'];
        $file_type = $_FILES['CV']['type'];
        //$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $extensions = array("pdf", "docx", "png");

        /* if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }*/

        if ($file_size > 209715002) {
            $errors[] = 'File size must be excately 2 MB';
        }
        if ($file_name != null) {
            $_SESSION["CVse"] = $file_name;
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "CV/" . $file_name);

            $data['CV'] = $_SESSION["CVse"];

            if ($data['CV'] != null) {
                $counter++;
            }
        } else {
        }
        if ($_SESSION["CVse"] == "none") {
            $msg2 = "CV not Uploaded";
        }


        $data['Name'] = $_POST['Name'];
        $data['tUsername'] = $_POST['tUsername'];
        $data['Password'] = $_POST['Password'];
        //$data['Address'] = $_POST['Address'];
        $data['Location'] = $_POST['InterestedLocation'];
        $data['Email'] = $_POST['Email'];
        $data['Phone'] = $_POST['Phone'];
        // $data['SalaryStart'] = $_POST['SalaryStart'];
        // $data['SalaryEnd'] = $_POST['SalaryEnd'];
        $data['Salary'] = $_POST['SalaryStart'] . "-" . $_POST['SalaryEnd'];
        $data['Verify'] = "false";
        $data['Type'] = "tutor";


        //$data['ProfilePic'] = "a";

        // echo $counter;
        if ($counter >= 12) {
            if (addTutor($data)) {
                // echo 'Successfully added!!';
                header("Location: workDone.php");
                exit();
            } else {
                echo 'You are not allowed to access this page.';
            }
        }
    }
    ?>



    <h2 class="header"><u>Registation For Tutor</u> </h2>
    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Profile Pic
                </td>
                <td>
                    <img class="pic" src=" ProPic/<?php echo $_SESSION["ProPic"]; ?>" height="100px">
                    <br>
                    <input type="file" name="fileToUpload" />
                    <br>
                    <span class="error"> <?php echo $msg; ?></span>
                    <br>
                </td>
            </tr>
            <br>
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
                    <input type="text" id="myInput" name="Phone" value=<?php echo $Phone ?>>
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
                    Interested Class
                    <br>
                    <br>
                </td>
                <td>
                    <input type="checkbox" name="class1to5" <?php echo (isset($_POST['class1to5']) == 'checked') ?  'checked' : ''; ?>>Class 1 - Class 5
                    <input type="checkbox" name="class6to8" <?php echo (isset($_POST['class6to8']) == 'checked') ?  'checked' : ''; ?>>Class 6 - Class 8
                    <input type="checkbox" name="class9to10" <?php echo (isset($_POST['class9to10']) == 'checked') ?  'checked' : ''; ?>>Class 9 - Class 10
                    <span class="error">* <?php echo $errInterestedClass; ?></span>
                    <br>
                    <br>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Interested Subject
                    <br>
                    <br>
                </td>
                <td>
                    <input type="checkbox" name="Bangla" <?php echo (isset($_POST['Bangla']) == 'checked') ?  'checked' : ''; ?>>Bangla
                    <input type="checkbox" name="English" <?php echo (isset($_POST['English']) == 'checked') ?  'checked' : ''; ?>>English
                    <input type="checkbox" name="Chemistry" <?php echo (isset($_POST['Chemistry']) == 'checked') ?  'checked' : ''; ?>>Chemistry
                    <input type="checkbox" name="Physics" <?php echo (isset($_POST['Physics']) == 'checked') ?  'checked' : ''; ?>>Physics
                    <input type="checkbox" name="Math" <?php echo (isset($_POST['Math']) == 'checked') ?  'checked' : ''; ?>>Math
                    <input type="checkbox" name="Biology" <?php echo (isset($_POST['Biology']) == 'checked') ?  'checked' : ''; ?>>Biology
                    <span class="error">* <?php echo $errInterestedSubject; ?></span>
                    <br>
                    <br>
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    Interested Location
                </td>
                <td>
                    <select name="InterestedLocation" id="myInput">
                        <option name="Option">Choose Option</option>
                        <option name="Mirpur" <?php if ($Address == 'Banani') { ?>selected="true" <?php }; ?>>Banani</option>
                        <option name="Mirpur" <?php if ($Address == 'Mirpur') { ?>selected="true" <?php }; ?>>Mirpur</option>
                        <option name="Kuril" <?php if ($Address == 'Uttara') { ?>selected="true" <?php }; ?>>Uttara</option>
                    </select>
                    <span class="error">* <?php echo $errInterestedLocation; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    Salary (Range)
                </td>
                <td>
                    <br>
                    <input type="number" id="salaryInput" min="0" max="999999" name="SalaryStart" value=<?php echo $SalaryStart ?>> -
                    <input type="number" id="salaryInput" min="1" max="999999" name="SalaryEnd" value=<?php echo $SalaryStart ?>>
                    <span class="error">* <?php echo $errSalary; ?></span>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    CV
                </td>
                <td>
                    <input type="file" id="CV" name="CV">
                    <span class="error"> <?php echo $msg2; ?></span>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <button type="submit" class="buttonReg button2Reg" name="button" value="submit" class="button">Sign UP</button>
    </form>

</body>
<?php include 'footer2.php'; ?>

</html>