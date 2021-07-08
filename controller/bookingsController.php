<?php
require_once 'model_z.php';

function fetchBookingRequests($email) {
	return showAllBookings($_SESSION['Email']);
}

function fetchSearchedTutors($subject) {
	return searchTutor($_POST['subject']);
}

/* function fetchNewTutors($Verify) {
	return showNewTutors($Verify);
}

function fetchNewTutorInfo($tEmail) {
	return showNewTutorInfo($tEmail);
} */

?>
