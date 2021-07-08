<?php
/*  session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor"){
    #(isset($_SESSION['Email'])) {
        header("location: LoginTutor.php");
        exit;
    

} else { */
#require_once 'controller/bookingsController.php';
require_once 'model_z.php';
$Verify = "false";
$tutors = showNewTutorInfo($Verify);
/* foreach ( $tutors as $tutor) {
        echo $tutor->Email;
        echo "<br>";
        echo $tutor->Gender;
        echo "<br>";
    } */

//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style_Tazin.css">

    <title>Tutor Verification</title>
</head>

<body>
    <div class="header">
        <?php include "headerAdmin.html"; ?>
    </div>
    <!-- verify tutor banner -->
    <section id="verifyTutorBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-heading">Verify New Tutors</p>
                    <p>Verify new users who have signed up as tutors.</p>
                </div>
                <div class="col-md-6">
                    <img src="image/verified.png" width="250" height="250" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- verify tutor banner -->
    <div class="verify-tutor-table">
        <hr class="solid">
        <form id="verify-tutor" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Tutor's Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>CV</th>
                    <th>Verification</th>
                </tr>
                <?php foreach ($tutors as $tutor) : ?>
                    <tr>
                        <td><?php echo $tutor->tUsername; ?>
                        <td><?php echo $tutor->Name; ?></td>
                        <td><?php echo $tutor->Email; ?><input type="hidden" name="tEmail" class="tEmail" value="<?php echo $tutor->Email; ?>"></td>
                        <td><?php echo $tutor->Gender; ?></td>
                        <td><?php echo $tutor->Phone; ?></td>
                        <td><a href="CV/<?php echo $tutor->CV; ?>" class="CVDownload" download>
                                <?php echo $tutor->CV; ?></a></td>

                        <td><a href="acceptTutor.php?tEmail=<?php echo $tutor->Email; ?>" onclick="return confirm('Are you sure you want to accept?')">Accept</a>&nbsp;
                            <a href="rejectTutor.php?tEmail=<?php echo $tutor->Email; ?>" onclick="return confirm('Are you sure you want to reject?')">Reject</a></td>
                    </tr>
                <?php endforeach; ?>


            </table>
        </form>
    </div>
    <footer class="footer">
        <?php echo "<p>Copyright &copy; 2020";
        ?>
        <a class="" href="">About Us |</a>
        <a class="" href="#">FAQ |</a>
        <a class="" href="tazin/contactUs.php">Contact Us</a>
    </footer>
</body>

</html>