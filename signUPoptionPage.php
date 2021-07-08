<!DOCTYPE HTML>
<html>
<title>Sign Up Option</title>

<head>
    <link rel="stylesheet" href="css/style_Zahin.css">
</head>

<?php include 'header1.html'; ?>

<?php

session_start();
$_SESSION["ProPic"] = "img.png";
$_SESSION["CVse"] = "none";
?>

<body>
    <br>
    <br>
    <span id="formSignOption">

        <h2>Please Choose option as whom you wanna <b id="sign">Sign UP</b></h2>
        <a href="Registration.php"> <button class="buttonSignOption button2SignOption buttonParent">Parent</button></a>
        <a href="tutor_registration .php"><button class="buttonSignOption button2SignOption">Tutor</button></a>
    </span>
</body>
<?php include 'footer.php'; ?>

</html>