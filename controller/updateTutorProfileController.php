<?php
session_start();
require_once '../model_z.php';
require_once '../db_connect.php';
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor") {
	#(isset($_SESSION['Email'])) {
	header("location: LoginTutor.php");
	exit;
}

if (isset($_POST['updateTutor'])) {
	#testing php form validation
	if (empty($_POST["interestedClass"])) {
		$interesedClassErr = "Please select at least one option.";
		$_SESSION['interestedClassErr'] = $interesedClassErr;
		header('Location: ../editProfileTutor.php');
	} else {
		unset($_SESSION['interestedClassErr']);
	}

	if (empty($_POST["interestedSub"])) {
		$interesedSubErr = "Please select at least one subject.";
		$_SESSION['interestedSubErr'] = $interesedSubErr;
		header('Location: ../editProfileTutor.php');
	} else {
		unset($_SESSION['interestedSubErr']);
	}

	/* if(!empty($_POST["interestedClass"])) {
		$checked_class = count($_POST["interestedClass"]);
		if($checked_class < 2)
		$interesedClassErr = "Please select at least one option.";
		$_SESSION['interestedClassErr'] = $interesedClassErr;
		header('Location: ../editProfileTest.php');
	} this works!!! */

	#testing ends
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$email = $data['email']; ////////?
	$data['gender'] = $_POST['gender'];
	$data['phone'] = $_POST['phone'];

	$data['location'] = $_POST['location'];


	$classArray = $_POST["interestedClass"];
	$data['interestedClass'] = implode(",", $classArray);


	$subjectArray = $_POST["interestedSub"];
	$data['interestedSub'] = implode(",", $subjectArray);



	$data['salaryStart'] = $_POST['salaryStart'];
	$data['salaryEnd'] = $_POST['salaryEnd'];
	$data['salary'] = $data['salaryStart'] . "-" . $data['salaryEnd'];

	if (empty($_FILES["ProfilePic"]["name"])) {
		$data['ProfilePic'] = showTutorPicture($_POST['email']);
	} else if ($_FILES["ProfilePic"]["size"] > 5000000) {
		$ProPicErr = "Sorry, your file size is larger than 5MB.";
		$_SESSION['ProPicErr'] = $ProPicErr;
	} else {
		unset($_SESSION['ProPicErr']);
		$data['ProfilePic'] = basename($_FILES["ProfilePic"]["name"]);

		$target_dir = "../ProPic/";
		$target_file = $target_dir . basename($_FILES["ProfilePic"]["name"]);


		if (move_uploaded_file($_FILES["ProfilePic"]["tmp_name"], $target_file)) {
			echo "The file " . basename($_FILES["ProfilePic"]["name"]) . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	} //this works!
	$extensions = array("pdf", "docx", "doc");
	if (empty($_FILES["CV"]["name"])) {
		$data['CV'] = showTutorCV($_POST['email']);
	} #testing validation
	else if ($_FILES["CV"]["size"] > 2097152) {
		$CVerr = 'Sorry, file size must be less than 2 MB';
		$_SESSION['CVerr'] = $CVerr;
		header('Location: ../editProfileTest.php');
	} /* else if ($_FILES["CV"]["type"] != ".pdf") {
		$CVerr = 'Sorry, file must be either of PDF, docx or doc type.';
		$_SESSION['CVerr'] = $CVerr;
	} */ else {
		unset($_SESSION['CVerr']);
		$data['CV'] = basename($_FILES["CV"]["name"]);

		$target_dir = "../CV/";
		$target_file = $target_dir . basename($_FILES["CV"]["name"]);


		if (move_uploaded_file($_FILES["CV"]["tmp_name"], $target_file)) {
			echo "The file " . basename($_FILES["CV"]["name"]) . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}

	if (updateTutor($_POST['email'], $data)) {
		echo 'Successfully updated!!';
		//redirect to editProfile with updated info
		header('Location: ../editProfileTutor.php');
		#header('Location: ../LogInTutor.php');

	}
} else {
	echo 'Error. You are not allowed to access this page.';
}
