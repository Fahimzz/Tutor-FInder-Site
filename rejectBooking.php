<?php
require_once 'model_z.php';
session_start();

 if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor"){
    #(isset($_SESSION['Email'])) {
        header("location: LoginTutor.php");
        exit;
    
} else //if(isset($_POST['pUsername']))
{
    $pEmail = $_GET['pEmail'];
    $tEmail = $_GET['tEmail'];
    $Status = "Rejected";


    if (rejectBooking($Status, $pEmail, $tEmail)) {
        deleteBooking($pEmail, $tEmail);
        bookingRejected($pEmail, $tEmail);
        header('Location: checkBookingTutor.php');
    } else {
        header('Location: tutorHome.php');
    }
}