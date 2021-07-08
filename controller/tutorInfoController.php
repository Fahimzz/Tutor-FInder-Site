<?php 
#session_start();
require_once 'model_z.php';

/* function fetchAllTutors(){
	return showAllTutors();

} */

function fetchTutor($email) {
	#return showTutorInfo($email);
	return showTutorInfo($_SESSION['Email']);

}

function fetchTutorLocation($email) {
	#return showTutorInfo($email);
	return showTutorLocation($_SESSION['Email']);

}

function fetchTutorClass($email) {
	#return showTutorInfo($email);
	return showTutorClass($_SESSION['Email']);

}

function fetchTutorSubject($email) {
	#return showTutorInfo($email);
	return showTutorSubject($_SESSION['Email']);

}

function fetchTutorSalary($email) {
	#return showTutorInfo($email);
	return showTutorSalary($_SESSION['Email']);

}

/* function fetchTutorPicture($email) {
	return showTutorPicture($_SESSION['Email']);

} */
