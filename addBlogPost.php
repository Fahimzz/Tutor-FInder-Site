<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "admin") {
  #(isset($_SESSION['Email'])) {
  header("location: LoginTutor.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style_Tazin.css">
  <title>Add New Post</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbarBackground">
    <div class="d-flex flex-grow-1">
      <span class="w-100 d-lg-none d-block">
        <!-- hidden spacer to center brand on mobile --></span>
      <a class="navbar-brand d-none d-lg-inline-block" href="#">
        <img src="logo.png" height="60" />
      </a>
      <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
        <!--<img src="//placehold.it/40?text=LOGO" alt="logo"> -->
        <img src="logo.png" />
      </a>
      <div class="w-100 text-right">
        <button class="navbar-toggler togglerBtn" type="button" data-toggle="collapse" data-target="#myNavbar">
          <!--<span class="navbar-toggler-icon navbar-dark"></span>-->
          <i class="fa fa-bars" style="font-size:24px"></i>
        </button>
      </div>
    </div>

    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
      <ul class="navbar-nav ml-auto flex-nowrap ulColor">
        <li class="nav-item">
          <a href="HomePageAdmin.php">Home</a>
        </li>
        <li class="nav-item">
          <a href="addBlogPost.php" class="nav-link m-2 menu-item">Add New Post</a>
        </li>
        <li class="nav-item">
          <a href="LogInTutor.php" class="nav-link m-2 menu-item">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>Add Post</h1>
    <form method="POST" action="blogPostsController.php">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" class="form-control">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="author" class="form-control" value=<?php echo $_SESSION['Email'] ?> disabled>
      </div>
      <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
      </div>
      <input type="submit" name="submitNewPost" value="Submit" class="btn-blog">
    </form>
  </div>
</body>

</html>