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
    $Status = "Accepted";


    if (acceptBooking($Status, $pEmail, $tEmail)) {
        //deleteBooking($pUsername);
        header('Location: checkBookingTutor.php');
    } else {
        header('Location: tutorHome.php');
    }

/*     $pUsername = $_POST['pUsername'];
    //$tUsername = $_POST['tUsername'];

    // Do whatever you want with the $uid

    //$_SESSION["Email"] = $_GET['tEmail'];
    //$data['id'] = $_POST['id'];
    /* $data['tUsername'] = $_POST['tUsername'];
    $data['pUsername'] = $_POST['pUsername'];
    $data['tEmail'] = $_SESSION['Email'];
    $data['pEmail'] = $_POST['pEmail']; */
    //$_POST['id']
    /* $booking = showBooking($pUsername);
    echo $booking['tUsername'];
    $data['tUsername'] = $booking['tUsername'];
    $data['pUsername'] = $booking['pUsername'];
    $data['pEmail'] = $booking['pEmail'];
    $data['tEmail'] = $booking['tEmail']; */
    /* $Status = "Accepted";
    $email = $_SESSION['Email'];

    if (acceptBooking($pUsername, $email)) {
        //deleteBooking($pUsername);
        header('Location: checkBookingTutor.php');
    } else {
        header('Location: tutorHome.php');
    } */  
}
