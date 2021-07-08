<?php include "headerTutorHome.html"; ?>
<?php
session_start();
#include "headerTutor.html";

//$_SESSION["loggedin"] !== "tutor";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor") {
    header("location: LoginTutor.php");
    exit;
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('tutor background 4.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <title>Welcome Tutor</title>
</head>



<?php include "footer.php";
