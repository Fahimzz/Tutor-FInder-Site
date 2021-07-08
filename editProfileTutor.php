<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor") {
    #(isset($_SESSION['Email'])) {
    header("location: LoginTutor.php");
    exit;
} else {
    require_once 'controller/tutorInfoController.php';
    $_GET['email'] = $_SESSION['Email'];
    $tutor = fetchTutor($_GET['email']);

    $tutorLocation = fetchTutorLocation($_GET['email']);

    $tutorClass = fetchTutorClass($_GET['email']);
    #echo $tutorClass;
    #echo "<br>";
    $class = explode(",", $tutorClass);
    #print_r($class);


    $tutorSubject = fetchTutorSubject($_GET['email']);
    #echo $tutorSubject;
    #echo "<br>";
    $subject = explode(",", $tutorSubject);
    #print_r($subject);

    $tutorSalary = fetchTutorSalary($_GET['email']);
    #echo $tutorSalary;
    #echo "<br>";
    $salary = explode("-", $tutorSalary);
    #print_r($salary);
    $salaryStart = $salary[0];
    $salaryEnd = $salary[1];

    #$tutor = fetchTutor($_GET[$_SESSION['Email']]);
    #$tutor = $_SESSION['Email'];

    // foreach($tutor as $x => $x_value) {
    //     echo "Key=" . $x . ", Value=" . $x_value;
    //     echo "<br>";
    // }

}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style_Tazin.css">
    <title>Edit Profile</title>
</head>

<body>
    <?php
    $interesedClassErr = isset($_SESSION['interestedClassErr']) ? $_SESSION['interestedClassErr'] : ' ';
    $interestedSubErr = isset($_SESSION['interestedSubErr']) ? $_SESSION['interestedSubErr'] : ' ';
    $CVerr = isset($_SESSION['CVerr']) ? $_SESSION['CVerr'] : ' ';
    $ProPicErr = isset($_SESSION['ProPicErr']) ? $_SESSION['ProPicErr'] : ' ';
    ?>
    <nav class="navbar navbar-expand-lg navbarBackground">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block">
                <!-- hidden spacer to center brand on mobile --></span>
            <a class="navbar-brand d-none d-lg-inline-block" href="#">
                <img src="logo.png" height="60" />
            </a>
            <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
                <!--<img src="//placehold.it/40?text=LOGO" alt="logo"> -->
                <img src="logo.png" />
            </a>
            <div class="w-100 text-right">
                <button class="navbar-toggler togglerBtn" type="button" data-toggle="collapse" data-target="#myNavbar">
                    <!--<span class="navbar-toggler-icon navbar-dark"></span>-->
                    <i class="fa fa-bars" style="font-size:24px"></i>
                </button>
            </div>
        </div>

        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap ulColor">
                <li class="nav-item">
                    <a href="tutorHome.php" class="nav-link m-2 menu-item nav-active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="checkBookingTutor.php" class="nav-link m-2 menu-item">Booking Requests</a>
                </li>
                <li class="nav-item">
                    <a href="editProfileTutor.php" class="nav-link m-2 menu-item nav-active">Edit Profile Information</a>
                </li>
                <li class="nav-item">
                    <a href="updatePass.php" class="nav-link m-2 menu-item nav-active">Change Password</a>
                </li>
                <li class="nav-item">
                    <a href="LogInTutor.php" class="nav-link m-2 menu-item">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- edit banner -->
    <section id="editBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-heading">Edit Profile Information</p>
                    <p>Make any edits or updates you wish to add.</p>
                </div>
                <div class="col-md-6">
                    <img src="image/settings.png" width="250" height="250" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- edit banner -->

    <div class="editProfile">
        <hr class="solid">
        <form id="editProfileTutor" name="editTutorInfo" method="POST" action="controller/updateTutorProfileController.php" enctype="multipart/form-data" onsubmit="return validateForm()">

            <table class="profile">
                <tr>
                    <th style="text-align: left;">
                        <label for="profilePic">Profile Picture</label>
                    </th>
                    <td>
                        <img width="200px" height="200px" src="ProPic/<?php echo $tutor['ProfilePic'] ?>" alt="<?php echo $tutor['Name'] ?>"><br>
                        <input type="file" name="ProfilePic" id="image"><br>
                        <?php $_SESSION['ProfilePic'] = $tutor['ProfilePic']; ?>
                        <span class="error"> <?php echo $ProPicErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left;">
                        <label for="name">Name</label>
                    </th>
                    <td>
                        <input type="text" id="name" name="name" value="<?php echo $tutor['Name']; ?>">
                    </td>
                    </td>
                </tr>

                <tr>
                    <th style="text-align: left;"><label for="location">Location</label></th>
                    <td>
                        <select name="location" id="location">
                            <option value="" disabled selected></option>
                            <option value="Banani" <?php if ($tutorLocation['Location'] === 'Banani') echo "selected"; ?>>Banani</option>
                            <option value="Mirpur" <?php if ($tutorLocation['Location'] === 'Mirpur') echo "selected"; ?>>Mirpur</option>
                            <option value="Bashundhara" <?php if ($tutorLocation['Location'] === 'Bashundhara') echo "selected"; ?>>Bashundhara</option>
                            <option value="Uttara" <?php if ($tutorLocation['Location'] === 'Uttara') echo "selected"; ?>>Uttara</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left;">
                        <label for="email">Email</label>
                    </th>
                    <td>
                        <input type="text" name="email" value="<?php echo $tutor['Email']; ?>">
                    </td>
                </tr>

                <tr>
                    <th style="text-align: left;">
                        <label for="phone">Phone</label>
                    </th>
                    <td>
                        <?php echo "+88" ?><input type="text" name="phone" value="<?php echo $tutor['Phone']; ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left;">
                        <label for="gender">Gender</label>
                    </th>
                    <td>
                        <p><input type="radio" name="gender" value="Female" <?php if ($tutor['Gender'] == 'Female') echo "checked"; ?>>Female
                            <input type="radio" name="gender" value="Male" <?php if ($tutor['Gender'] == 'Male') echo "checked"; ?>>Male
                            <input type="radio" name="gender" value="Other" <?php if ($tutor['Gender'] == 'Other') echo "checked"; ?>>Other
                    </td>
                </tr>

                <tr>
                    <th style="text-align: left;"><label for="interestedClass">Interested Class</label></th>
                    <td>
                        <input type="checkbox" name="interestedClass[]" value="Class1to5" <?php if (in_array("Class1to5", $class)) {
                                                                                                echo "checked";
                                                                                            } ?>>Class 1 - Class 5
                        <input type="checkbox" name="interestedClass[]" value="Class6to8" <?php if (in_array("Class6to8", $class)) {
                                                                                                echo "checked";
                                                                                            } ?>>Class 6 - Class 8
                        <input type="checkbox" name="interestedClass[]" value="Class9to10" <?php if (in_array("Class9to10", $class)) {
                                                                                                echo "checked";
                                                                                            } ?>>Class 9 - Class 10
                        <span class="error"> <?php echo $interesedClassErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <th style="text-align: left;"><label for="interestedSub">Interested Subject</label></th>
                    <td>
                        <input type="checkbox" name="interestedSub[]" value="Bangla" <?php if (in_array("Bangla", $subject)) {
                                                                                            echo "checked";
                                                                                        } ?>>Bangla
                        <input type="checkbox" name="interestedSub[]" value="English" <?php if (in_array("English", $subject)) {
                                                                                            echo "checked";
                                                                                        } ?>>English
                        <input type="checkbox" name="interestedSub[]" value="Chemistry" <?php if (in_array("Chemistry", $subject)) {
                                                                                            echo "checked";
                                                                                        } ?>>Chemistry
                        <input type="checkbox" name="interestedSub[]" value="Physics" <?php if (in_array("Physics", $subject)) {
                                                                                            echo "checked";
                                                                                        } ?>>Physics
                        <input type="checkbox" name="interestedSub[]" value="Math" <?php if (in_array("Math", $subject)) {
                                                                                        echo "checked";
                                                                                    } ?>>Math
                        <input type="checkbox" name="interestedSub[]" value="Biology" <?php if (in_array("Biology", $subject)) {
                                                                                            echo "checked";
                                                                                        } ?>>Biology
                        <span class="error"> <?php echo $interestedSubErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <th style="text-align: left;"><label for="salary">Salary</label></th>
                    <td>
                        <input type="text" name="salaryStart" value="<?php echo $salaryStart; ?>"> <?php echo " - "; ?> <input type="text" name="salaryEnd" value="<?php echo $salaryEnd; ?>">
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left;"><label for="CV">Upload new CV</label></th>
                    <td>
                        <input type="file" name="CV" id="CV">
                        <span class="error"> <?php echo $CVerr; ?></span>
                    </td>
                </tr>

            </table>
            <br>
            <input type="submit" name="updateTutor" value="Update" class="btn-update-tutor">
    </div>
    <footer class="footer">
        <?php echo "<p>Copyright &copy; 2020";
        ?>
        <a class="" href="aboutUs.html">About Us |</a>
        <a class="" href="faq.php">FAQ |</a>
        <a class="" href="contactUs.php">Contact Us</a>
    </footer>
    <script src="js/editValidation.js"></script>
</body>

</html>