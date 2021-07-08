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

  <?php

  $nameErr = $emailErr =  $genderErr =   $pusernameErr = $passwordErr = "";
  $name = $email =  $gender = $pusername = $password = "";
  $Verified = "false";
  $counter = 0;

  // $_SESSION["loggedin"] === "tutor";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = "Only letters and desh are allowed";
    }


    if (empty($_POST["email"])) {

      $emailErr = "Email is required";
    } else {

      $email = test_input($_POST["email"]);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $emailErr = "Invalid email format";
    }



    if (empty($_POST["gender"])) {
      $genderErr = "At least one of them must be selected";
    } else {
      $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["pusername"])) {

      $pusernameErr = "username is required";
    } else {

      $pusername = test_input($_POST["pusername"]);
    }

    if (empty($_POST["password"])) {

      $passwordErr = "password is required";
    } else {

      $password = test_input($_POST["password"]);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



  ?>


  <?php include 'header1.html'; ?>
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
  <h1 class="regH">Parents' Registration</h1>
  <br>
  <div class="container">
    <div class="myform">
      <form class="" id="" name="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="row">
          <div class="form-group clo-4">
            <label>Select image:</label>
            <input type="file" name="image">
          </div>

        </div>
        <div class="row">
          <div class="form-group clo-6">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
            <span class="error"> <?php echo $nameErr; ?></span>

          </div>


        </div>

        <div class="row">
          <div class="form-group clo-6">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="error"> <?php echo $emailErr; ?></span>

          </div>


        </div>




        <div class="row">
          <div class="form-group clo-6">
            <label>Gender: </label>

            <input type="radio" name="gender" value="male">Male

            <input type="radio" name="gender" value="female">Female


            <input type="radio" name="gender" value="other">Other
            <br><br>
            <span class="error"> <?php echo $genderErr; ?></span>


          </div>

        </div>

        <div class="row">
          <div class="form-group clo-6">
            <label>User Name:</label>
            <input type="text" name="pusername" class="form-control" placeholder="User Name">
            <br>
            <span class="error"> <?php echo $pusernameErr; ?></span>

          </div>

        </div>

        <div class="row">
          <div class="form-group clo-6">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Passwords">
            <span class="error"> <?php echo $passwordErr; ?></span>

          </div>

        </div>

        <div class="row">
          <div class="form-group clo-6">
            <label>Type:</label>
            <input type="type" name="type" class="form-control" value="Parent">

          </div>
        </div>






        <div class="row">
          <div class="form-group clo-6">

            <button type="submit" name="createParent" class="btn btn-primary" value="create">SUBMIT</button>
            <button type="reset" name="createParent" class="btn btn-primary" value="create">RESET</button>

          </div>

        </div>

      </form>

    </div>
  </div>


</body>

</html>



<?php include 'footer2.php'; ?>