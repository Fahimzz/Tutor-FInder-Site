<?php  
require_once '../model.php';


if (isset($_POST['updateparent'])) {
    $data['name'] = $_POST['name'];
	$data['pusername'] = $_POST['pusername'];
	$data['gender'] = $_POST['gender'];
	


  if (updateparent($_POST['email'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
  
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>