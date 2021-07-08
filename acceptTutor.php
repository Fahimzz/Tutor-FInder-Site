<?php
require_once 'model_z.php';
/* session_start();

 if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor"){
    
        header("location: LoginTutor.php");
        exit;
    
} else
{ */
    
    $tEmail = $_GET['tEmail'];
    $Verify = "true";


    if (acceptTutor($Verify, $tEmail)) {
        verifyLogin($Verify, $tEmail);
        header('Location: verifyTutor.php');
    } else {
        header('Location: tutorHome.php');
    } 
//}