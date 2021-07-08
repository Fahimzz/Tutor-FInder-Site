<?php
session_start();



//$_SESSION["loggedin"] !== "tutor";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "parent") {
  header("location: LoginTutor.php");
  exit;
}
include('connection.php');
$query = "SELECT * FROM `topteachers`;";
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
            <a class="nav-link" href="requestedtutorinfo.php">Bookings</a>
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
          <p class="promo-title">Welcome to our service</p>
        </div>
        <div class="col-md-6">
          <img src="image/teach.png" class="img-fluid">
        </div>
      </div>
    </div>


    <br>
    <h1 class="regH">Newsfeed</h1>
    <br>
    <br>
    <h4 class="regH">Top Tutors</h4>
    <br>
    <div>
      <table border="1" cellspacing="5" cellpadding="5" width="100%">
        <thead>
          <tr>


            <th>NAME</th>
            <th>EMAIL </th>
            <th>SUBJECT</th>
            <th>CLASSLEVEL</th>
            <th>LOCATION</th>
            <th>SALARY</th>
            <th>ACTION</th>

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
              <td><label><?php echo $row['name']; ?></label></td>
              <td><label><?php echo $row['email']; ?></label></td>

              <td><label><?php echo $row['subject']; ?></label></td>

              <td><label><?php echo $row['classlevel']; ?></label></td>
              <td><label><?php echo $row['location']; ?></label></td>

              <td><label><?php echo $row['salary']; ?></label></td>
              <td><a class="btn btn-primary" href="requestTutor.php?tEmail=<?php echo $row['email']; ?>&pEmail=<?php echo $_SESSION['Email']; ?>" role="button">Booking Request</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>


  </section>



</body>

</html>

<!-------Sevice-------------->
<section id="service">
  <div class="container text-center ">
    <h1 class="title">What Can We Do For You?</h1>
    <div class="row text-center">
      <div class="col-md-4 services">
        <img src="image/s.png" class="service-img">
        <h4>Search For Best Teachers</h4>
        <p>Here we will give you the best option among this whole Country</p>

      </div>
      <div class="col-md-4 services">
        <img src="image/review.png" class="service-img">
        <h4>Give Review On Their Service</h4>
        <p>You can give review of a teacher for their teaching quality and their behaviour.</p>

      </div>
      <div class="col-md-4 services">
        <img src="image/contact.png" class="service-img">
        <h4>Contact Through Us</h4>
        <p>We are giving you the privilege to contact with the best teachers</p>

      </div>
    </div>
  </div>

  <!------>





</section>

<?php include 'footer2.php'; ?>