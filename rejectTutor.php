<?php
require_once 'model_z.php';
/* session_start();

 if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor"){
    
        header("location: LoginTutor.php");
        exit;
    
} else
{ */
    $tEmail = $_GET['tEmail'];


     if (rejectTutor($tEmail)) {
        rejectTutorLogin($tEmail);
        header('Location: verifyTutor.php');
    } else {
        header('Location: tutorHome.php');
    }
//}