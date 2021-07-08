<?php
session_start();


//$_SESSION["loggedin"] !== "tutor";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "admin") {
  header("location: LoginTutor.php");
  exit;
}
?>

<?php include 'headerAdmin.html'; ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/style_Zahin.css?version=1">
  <style>
    #txtAdminHome {
      font-size: 30px;
      text-align: center;
    }

    #comAdminHOme {
      color: #5f1782;
      font-size: 70px;
    }

    @media (max-width: 700px) {
      #txtAdminHome {
        font-size: 20px;
        text-align: center;
      }

      #comAdminHOme {
        color: #5f1782;
        font-size: 60px;
      }
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>
</head>

<body>
  <br />
  <br />
  <span id="txtAdminHome">
    <h1>Welcome Back <span id="comAdminHOme">Chief</span></h1>
    <h3>Choose your next Move!</h3>
  </span>
</body>

</html>

<?php include 'footer.php'; ?>