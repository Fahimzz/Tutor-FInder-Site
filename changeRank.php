<?php

require_once 'model_z.php';
session_start();

//$_SESSION["emailForUpdatePass"] = "A"; ////////////////////////

//echo $_SESSION["emailForUpdatePass"];
date_default_timezone_set('Asia/Dhaka');
$data['Updater'] =  $_SESSION["emailForUpdatePass"];
$data['Time'] = date("Y/m/d") . " : " . date("h:i:sa");
$data['Name'] = $_GET['Name'];





if ($_SESSION["typeF"] == "moderator") {
    echo '<script>alert("Sorry! You have No Access to this Option!")</script>';
    echo "Please Go back to Previous Page!";
    //header('Location:admins_info.php');
    //header('Location:js/actionDenied.php');
} else {
    $_SESSION["Email"] = $_GET['Email'];
    if ($_GET['Type'] == "admin") {
        $_SESSION["Type"] = "moderator";
        $data['Status'] = "demotion";
        if (updateType($_GET['Email'], $_SESSION["Type"])) {
            insertHistory($data);
            header('Location:admins_info.php');
        }
    } else {
        $_SESSION["Type"] = "admin";
        $data['Status'] = "promotion";
        if (updateType($_GET['Email'], $_SESSION["Type"])) {
            insertHistory($data);
            header('Location:admins_info.php');
        }
    }
}
