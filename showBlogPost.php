<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "admin") {
    #(isset($_SESSION['Email'])) {
    $_SESSION['Email'] = "";
}

require_once 'blogPostsController.php';


$post = fetchBlogPost($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_Tazin.css">
    <title>All Posts</title>
</head>

<body>
    <!-- example 6 - center on mobile -->
    <nav class="navbar navbar-expand-lg navbarBackground">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block">
                <!-- hidden spacer to center brand on mobile --></span>
            <a class="navbar-brand d-none d-lg-inline-block" href="#">
                <img src="tutor finder logo.png" height="60" />
            </a>
            <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
                <!--<img src="//placehold.it/40?text=LOGO" alt="logo"> -->
                <img src="tutor finder logo.png" />
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
                    <a href="moderatorHome.php" class="nav-link m-2 menu-item nav-active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="showAllBlogPosts.php" class="nav-link m-2 menu-item">All Posts</a>
                </li>
                <li class="nav-item">
                    <a href="LogInTutor.php" class="nav-link m-2 menu-item">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <a href="showAllBlogPosts.php">Back</a>
        <div class="blogPost">
            <h1><?php echo $post['title']; ?></h1>
            <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?> (Email: <?php echo $post['Email']; ?> )</small>
            <p><?php echo $post['body']; ?></p>

            <?php if ($_SESSION['Email'] == $post['Email']) : ?>
                <hr>
                <form class="float-right" method="POST" action="blogPostsController.php">
                    <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                    <input type="submit" name="deletePost" value="Delete" class="btn-delete" onclick="return confirm('Are you sure you want to delete?')">
                </form>

                <a href="editBlogPost.php?id=<?php echo $post['id']; ?>" class="btn btn-default">Edit</a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>