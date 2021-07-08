<?php
session_start();
include("connection.php");


//$_SESSION["loggedin"] !== "tutor";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "parent") {
  header("location: LoginTutor.php");
  exit;
}

$user = $_SESSION['Email'];
$res = mysqli_query($conn, "SELECT * FROM `parentsinfo` WHERE `Email` = '$user';");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$username = $userRow['pUsername'];
$name = $userRow['Name'];
$gender = $userRow['Gender'];
$image = $userRow['Image'];



?>
<!DOCTYPE html>
<html>

<head>
  <title> Edit parent</title>
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
            <a class="nav-link" href="requestedtutorinfo.php">Bookings</a>
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
  <!-------------banner----------->

  <section id="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="promo-title">Best Site For Finding Private Tutor Online</p>
          <p>You can find the best private tutors in this website.</p>
        </div>
        <div class="col-md-6">
          <img src="image/teach.png" class="img-fluid">
        </div>
      </div>
    </div>

  </section>




  <!-------------Registration----------->
  <br>
  <h1 class="regH">Edit Parent</h1>
  <br>
  <div class="container">
    <div class="myform">
      <form class="" id="" name="" method="POST" action="updateparent.php" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group clo-4">
            <label>Select image:</label>
            <input type="file" name="image">
          </div>

        </div>
        <div class="row">
          <div class="form-group clo-6">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $name; ?>">

          </div>


        </div>

        <div class="row">
          <div class="form-group clo-6">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_SESSION['Email'] ?>" readonly>

          </div>


        </div>




        <div class="row">
          <div class="form-group clo-6">
            <label>Gender: </label>

            <input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo "checked" ?>>Male

            <input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo "checked" ?>>Female


            <input type="radio" name="gender" value="other" <?php if ($gender == 'other') echo "checked" ?>>Other


          </div>

        </div>

        <div class="row">
          <div class="form-group clo-6">
            <label>User Name:</label>
            <input type="text" name="pusername" class="form-control" placeholder="User Name" value="<?php echo $username; ?>">

          </div>

        </div>


        <div class="row">
          <div class="form-group clo-6">
            <label>Type:</label>
            <input type="type" name="type" class="form-control" value="Parent" readonly>

          </div>
        </div>






        <div class="row">
          <div class="form-group clo-6">

            <button type="submit" name="updateparent" class="btn btn-primary" value="update">Update</button>

          </div>

        </div>

      </form>

    </div>
  </div>

  <script>
    var parentEdit = document.forms.myForm;
    parentEdit.onsubmit = function() {
      var userName = signupForm.username.value;
      var password = signupForm.password.value;
      var name = signupForm.name.value;
      var gender = signupForm.gender.value;


      var email = signupForm.email.value;

      if (email == "") {
        alert("Username must be filled out!");
        return false;
      }
      if (password == "") {
        alert("Password must be filled out!");
        return false;
      }

      if (name == "") {
        alert(" Name must be filled out!");
        return false;
      }
      if (gender == "") {
        alert("gender must be selected!");
        return false;
      }


      if (email == "") {
        alert("Email must be filled out!");
        return false;
      }

    }
  </script>


</body>

</html>

<?php include 'footer2.php'; ?>