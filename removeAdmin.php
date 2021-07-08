<?php

require_once 'model_z.php';
session_start();

if ($_SESSION["typeF"] == "moderator") {
    echo '<script>alert("Sorry! You have No Access to this Option!")</script>';
    echo "Please Go back to Previous Page!";
    //header('Location:admins_info.php');
    //header('Location:js/actionDenied.php');
} else {
    if (deleteAdmin($_GET['Email'])) {
        header('Location:admins_info.php');
    }
}
