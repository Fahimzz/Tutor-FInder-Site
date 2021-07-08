<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "tutor") {
    #(isset($_SESSION['Email'])) {
    header("location: LoginTutor.php");
    exit;
} else {
    require_once 'controller/bookingsController.php';
    require_once 'model_z.php';
    $_GET['email'] = $_SESSION['Email'];
    $bookings = fetchBookingRequests($_GET['email']);
    /*    foreach($bookings as $x => $x_value) {
         echo "Key=" . $x . ", Value=" . $x_value;
         echo "<br>";
    } */
}
?>
<?php include "headerTutorHome.html"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_Tazin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Check Booking Requests</title>
</head>

<body>
    <div class="header">

    </div>

    <!-- booking requests banner -->
    <section id="bookingRequestsBanner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="page-heading">Booking Requests</p>
                    <p>Accept or reject your received booking requests.</p>
                </div>
                <div class="col-md-6">
                    <img src="image/request.png" width="250" height="250" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- booking requests banner -->

    <div class="booking-requests-table">
        <hr class="solid">
        <form id="checkBookingTutor" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Booking Status</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($bookings as $booking) : ?>
                    <tr>
                        <td><?php echo $booking->pUsername; ?><input type="hidden" name="pUsername" class="pUsername" value="<?php echo $booking->pUsername; ?>">
                            <input type="hidden" name="tUsername" class="tUsername" value="<?php echo $booking->tUsername; ?>"></td>
                        <td><?php echo $booking->pEmail; ?><input type="hidden" name="pEmail" class="pEmail" value="<?php echo $booking->pEmail; ?>" data-pemail="<?php echo $booking->pEmail; ?>"></td>
                        <input type="hidden" name="tEmail" class="tEmail" id="tEmail" value="<?php echo $_SESSION['Email']; ?>" data-temail="<?php echo $booking->tEmail; ?>">
                        <input type="hidden" name="id" class="id" value="<?php echo $booking->id; ?>" data-id="<?php echo $booking->id; ?>">
                        <td><?php echo $booking->Status; ?><input type="hidden" name="Status" class="Status" value="<?php echo $booking->Status; ?>"></td>
                        <td><?php
                            if ($booking->Status == "Requested") {
                            ?> <a href="acceptBooking.php?tEmail=<?php echo $booking->tEmail; ?>&pEmail=<?php echo $booking->pEmail; ?>" onclick="return confirm('Are you sure you want to accept?')">Accept</a>&nbsp;<a href="rejectBooking.php?tEmail=<?php echo $booking->tEmail; ?>&pEmail=<?php echo $booking->pEmail; ?>" onclick="return confirm('Are you sure you want to reject?')">Reject</a></td>
                    <?php }
                            if ($booking->Status == "Accepted") {
                    ?> <a href="rejectBooking.php?tEmail=<?php echo $booking->tEmail; ?>&pEmail=<?php echo $booking->pEmail; ?>" onclick="return confirm('Are you sure you want to reject?')">Reject</a></td>
                    <?php } ?>

                    </tr>
                <?php endforeach; ?>
            </table>

        </form>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>