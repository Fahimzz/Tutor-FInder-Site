<?php
require_once 'blogPostsController.php';

$posts = fetchAllBlogPosts();

?>
<?php include "headerAdmin.html"; ?>
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
                    <a href="addBlogPost.php" class="nav-link m-2 menu-item">Add New Post</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- ----------------------------- -->
    <!-- blog posts banner -->
    <section id="bookingRequestsBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-heading">All Posts</p>
                    <p>Read all our stories in one place.</p>
                </div>
                <div class="col-md-6">
                    <img src="image/post.png" width="250" height="250" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- blog posts banner -->
    <div class="container">
        <?php foreach ($posts as $post) : ?>
            <div class="blogPosts">
                <h3><?php echo $post['title']; ?></h3>
                <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>
                <a class="btn btn-default" href="showBlogPost.php?id=<?php echo $post['id']; ?>">Read More</a>
                <hr class="solid">
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>