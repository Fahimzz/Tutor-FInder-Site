<?php
require_once 'model_z.php';
session_start();

 if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "parent"){
    #(isset($_SESSION['Email'])) {
        header("location: LoginTutor.php");
        exit;

} else //if(isset($_POST['pUsername']))
{
    $pEmail = $_GET['pEmail'];
    $tEmail = $_GET['tEmail'];
    $Status = "Requested";


    if (Bookingstatus($pEmail, $tEmail,$Status)) {
        //deleteBooking($pUsername)
        header('Location: requestedtutorinfo.php');
      #echo "request successfull";
    } else {
        #header('Location: tutorHome.php');
        echo "error";
    }


}
