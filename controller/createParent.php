<?php
require_once '../model.php';


if (isset($_POST['createParent'])) {
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['pusername'] = $_POST['pusername'];
	$data['gender'] = $_POST['gender'];
	$data['password'] = $_POST['password'];
	$data['Verify'] = "true";

	$data['type'] = $_POST['type'];
	$data['image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);

	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

	if (addParent($data)) {
		header("Location: ../workDone.php");
	}
} else {
	echo 'You are not allowed to access this page.';
}
