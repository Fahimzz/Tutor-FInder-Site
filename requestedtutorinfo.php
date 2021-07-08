<?php
session_start();



//$_SESSION["loggedin"] !== "tutor";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "parent") {
  header("location: LoginTutor.php");
  exit;
}
$email = "";
include('connection.php');
$email = $_SESSION["Email"];
$query = "SELECT * FROM `bookingrequest` WHERE pEmail= '$email' ;";
$res = mysqli_query($conn, $query);



?>

<!DOCTYPE html>
<html>

<head>
  <title>Online Tutor Finder</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

  <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#"><img id="logo" src="logo.png" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>

      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="Welcomeparent.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="parentEdit.php">Edit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="searchTutor.php">Search Tutor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="updatePass.php">Change Password</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>


        </ul>
      </div>
    </nav>
  </section>

  <!----------------------------------------Banner------------------------->

  <section id="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="promo-title">Best Service Ever</p>
        </div>
        <div class="col-md-6">
          <img src="image/teach.png" class="img-fluid">
        </div>
      </div>
    </div>

    <br>
    <h1 class="regH">Your Booking Status</h1>
    <br>

    <table border="1" cellspacing="5" cellpadding="5" width="100%">
      <thead>
        <tr>


          <th>Email</th>
          <th>Status </th>


        </tr>
      </thead>
      <tbody>
        <?php
        /* require_once('connection.php');
              $result = $conn->prepare("SELECT * FROM user_registration ORDER BY user_id ASC"); */
        /* $res->execute(); */
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
          <tr>
            <td><label><?php echo $row['tEmail']; ?></label></td>
            <td><label><?php echo $row['Status']; ?></label></td>

          </tr>
        <?php } ?>
      </tbody>
    </table>


  </section>

</body>

</html>

<?php include 'footer2.php'; ?>