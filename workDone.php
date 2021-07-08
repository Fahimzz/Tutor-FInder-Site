<!DOCTYPE html>
<html>

<head>
  <style></style>
</head>
<?php include 'header1.html';
session_start();
// Unset all of the session variables
$_SESSION = array();
// Destroy the session.
session_destroy();


?>

<body>
  <h2>Your Update Has been done.Please login Again.</h2>
</body>

</html>