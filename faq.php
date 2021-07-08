<?php #include "headerTutorHome.html";
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor"){
    include "headerTutorHome.html";
    } else{
        include "headerTutor.html";
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAQ</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- extra fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap"
      rel="stylesheet"
    />
    <!-- styles -->
    <link rel="stylesheet" href="css/style_Tazin.css" />
  </head>
  <body>
      <section class="questions">
        <!-- title -->
        <div class="faq-title">
          <h2>Frequently Asked Questions</h2>
        </div>
        <!-- questions -->
        <div class="section-center">
          <!-- single question -->
          <article class="question">
            <!-- question title -->
            <div class="question-title">
              <p>How do I search for tutors?</p>
              <button type="button" class="question-btn">
                <span class="plus-icon">
                  <i class="far fa-plus-square"></i>
                </span>
                <span class="minus-icon">
                  <i class="far fa-minus-square"></i>
                </span>
              </button>
            </div>
            <!-- question text -->
            <div class="question-text">
              <p>
                Using the multiple dropdown options we have for various criterias, you can search for tutors that perfectly match your requirements.
              </p>
            </div>
          </article>
          <!-- end of single question -->
          <!-- single question -->
          <article class="question">
            <!-- question title -->
            <div class="question-title">
              <p>How do I create my profile page?</p>
              <button type="button" class="question-btn">
                <span class="plus-icon">
                  <i class="far fa-plus-square"></i>
                </span>
                <span class="minus-icon">
                  <i class="far fa-minus-square"></i>
                </span>
              </button>
            </div>
            <!-- question text -->
            <div class="question-text">
              <p>
                You must sign up on our website to create your profile. After your profile is created, you may edit and update your information whenever required.
              </p>
            </div>
          </article>
          <!-- end of single question -->
          <!-- single question -->
          <article class="question">
            <!-- question title -->
            <div class="question-title">
              <p>Why was my tutor profile not approved?</p>
              <!-- button -->
              <button type="button" class="question-btn">
                <span class="plus-icon">
                  <i class="far fa-plus-square"></i>
                </span>
                <span class="minus-icon">
                  <i class="far fa-minus-square"></i>
                </span>
              </button>
            </div>
            <!-- question text -->
            <div class="question-text">
              <p>
                The information provided on your CV maybe was not correct. Please sign up again or if you think there has been a mistake, feel free to contact us through our Contact Us form.
              </p>
            </div>
          </article>
          <!-- end of single question -->
      </section>
    </main>
    <?php include 'footer.php'; ?>
    <!-- javascript -->
    <script src="js/faq.js"></script>
  </body>
</html>
