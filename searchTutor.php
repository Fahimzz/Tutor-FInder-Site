<?php
session_start();



//$_SESSION["loggedin"] !== "tutor";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "parent") {
  header("location: LoginTutor.php");
  exit;
}
require_once 'searchController.php';
require_once 'model.php';
$subject = $bookings = "";
if (isset($_POST['subject'])) {
  $subject = $_POST['subject'];
  $tutorSubject = fetchSearchedTutorsubject($subject);
}
#$tutor = searchTutor($_POST['subject']);
#echo $tutor

$salary = "";
if (isset($_POST['salary'])) {
  $salary = $_POST['salary'];
  $tutorsalary = fetchSearchedTutorsalary($salary);
}

$location = "";
if (isset($_POST['location'])) {
  $location = $_POST['location'];
  $tutorlocation = fetchSearchedTutorlocation($location);
}

$classlevel = "";
if (isset($_POST['classlevel'])) {
  $classlevel = $_POST['classlevel'];
  $tutorclasslevel = fetchSearchedTutorclasslevel($classlevel);
}

$postemail = "";
$tutordetails = "";
if (isset($_POST['email'])) {
  $postemail = 'test@gmail.com';
  $tutordetails = fetchtutordetails($postemail);
  foreach ($tutordetails as $m) {
    echo $m->tUsername;
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
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
  <h1 class="regH">Search Tutor</h1>
  <br>
  <div class="container">
    <div class="myform">
      <form class="" id="" name="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group clo-4">
            <label>Select Subject:</label>
            <select class="form-control" name="subject">
              <option value="Bangla">Bangla</option>
              <option value="English">English</option>
              <option value="Physics">Physics</option>
              <option value="Biology">Biology</option>

            </select>
          </div>

        </div>

        <div class="row">
          <div class="form-group clo-4">
            <label>Salary:</label>
            <select class="form-control" name="salary">
              <option value="1000-2000">1000-2000</option>
              <option value="3000-4000">3000-4000</option>
              <option value="5000-6000">5000-6000</option>
              <option value="7000-8000">7000-8000</option>

            </select>
          </div>

        </div>

        <div class="row">
          <div class="form-group clo-4">
            <label>Location:</label>
            <select class="form-control" name="location">
              <option value="Uttara">Uttara</option>
              <option value="Banani">Banani</option>
              <option value="Mirpur">Mirpur</option>
              <option value="Farmgate">Farmgate</option>

            </select>
          </div>

        </div>

        <div class="row">
          <div class="form-group clo-4">
            <label>Class Level:</label>
            <select class="form-control" name="classlevel">
              <option value="Class5to7">Class5to7</option>
              <option value="Class6to8">Class6to8</option>
              <option value="Class7to9">Class7to9</option>
              <option value="Class8to10">Class8to10</option>

            </select>
          </div>

        </div>



        <!----
    <div class="row">
      <div class="form-group clo-6">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Name">

      </div>
      

    </div>

    <div class="row">
      <div class="form-group clo-6">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Email">

      </div>
      

    </div>


    

    <div class="row">
      <div class="form-group clo-6">
        <label>Gender: </label>
        
        <input type="radio" name="gender" value="male">Male

        <input type="radio" name="gender" value="female">Female


        <input type="radio" name="gender" value="other">Other 
        

      </div>

    </div>

    <div class="row">
      <div class="form-group clo-6">
        <label>User Name:</label>
        <input type="text" name="pusername" class="form-control" placeholder="User Name">

      </div>

    </div>

    <div class="row">
      <div class="form-group clo-6">
        <label>Password:</label>
        <input type="password" name="password" class="form-control" placeholder="Passwords">

      </div>

    </div>

    <div class="row">
      <div class="form-group clo-6">
        <label>Type:</label>
        <input type="type" name="type" class="form-control" value="Parent">

      </div>
      </div>

     ---->




        <div class="row">
          <div class="form-group clo-6">

            <button type="submit" name="search" class="btn btn-primary" value="search">Search</button>

          </div>

        </div>

        <table>
          <tr>
            <th>Email</th>
            <th>Name</th>



          </tr>
          <?php foreach ($tutorSubject as $t) : ?>
            <tr>
              <?php $email = $t->Email; ?>
              <td><?php echo $email; ?></td>
              <td> <?php echo $t->tUsername; ?> </td>
              <input type="hidden" name="email" value="<?php echo  $t->Email ?>">

            </tr>
          <?php endforeach; ?>

          </tr>
          <?php foreach ($tutorsalary as $s) : ?>
            <tr>
              <td><?php echo $s->Email; ?></td>

            </tr>
          <?php endforeach; ?>

          </tr>
          <?php foreach ($tutorlocation as $l) : ?>
            <tr>
              <td><?php echo $l->Email; ?></td>

            </tr>
          <?php endforeach; ?>

          </tr>
          <?php foreach ($tutorclasslevel as $c) : ?>
            <tr>
              <td><?php echo $c->Email; ?></td>

            </tr>
          <?php endforeach; ?>

          </tr>
          <?php foreach ($tutordetails as $m) : ?>
            <tr>
              <td><?php echo $m->tUsername; ?></td>

            </tr>
          <?php endforeach; ?>




        </table>

      </form>

    </div>
  </div>


</body>

</html>

<?php include 'footer2.php'; ?>