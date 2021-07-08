<?php
session_start();
require_once '../model_z.php';
require_once '../db_connect.php';
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor"){
    #(isset($_SESSION['Email'])) {
        header("location: LoginTutor.php");
		exit;
}

if (isset($_POST['acceptBooking'])) {
    $data['tUsername'] = $_POST['tUsername'];
    $data['pUsername'] = $_POST['pUsername'];
    $data['tEmail'] = $_SESSION['Email'];
    $data['pEmail'] = $_POST['pEmail'];
    //$data['id'] = $_POST['id'];

    //showBooking($_POST['name']);
    //$data['name'] = $_POST['name'];
    
    /* if (acceptBooking($data)) {
		echo 'Successfully updated!!';
		//redirect to editProfile with updated info
        header('Location: ../checkBookingTutor.php');
        // ?email=' . $_SESSION['Email']);
		#header('Location: ../LogInTutor.php');
		
	} */

} else if (isset($_POST['rejectBooking'])) {
    echo "Rejected.";

} else{
    echo "Error";
}
?>