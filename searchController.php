<?php
require_once 'model.php';

function fetchSearchedTutorsubject($subject) {
	return searchTutor($_POST['subject']);
}

function fetchSearchedTutorsalary($salary)
{
	return searchtutorSalary($_POST['salary']);
}

function fetchSearchedTutorlocation($location)
{
	return searchtutorLocation($_POST['location']);
}

function fetchSearchedTutorclasslevel($classlevel)
{
	return searchtutorClasslevel($_POST['classlevel']);
}

function fetchtutordetails($postemail)
{
	return searchtutordetails($postemail);
}