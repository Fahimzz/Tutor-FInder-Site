<?php




/*if ($_COOKIE[$cookie_type] != "admin") {
    header("location: LoginTutor.php");
    echo $_COOKIE[$cookie_type] . "aaaaaa";
    //exit;
}*/
session_start();

//$_SESSION["loggedin"] !== "tutor";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "admin") {
    header("location: LoginTutor.php");
    exit;
}
?>



<?php
require_once 'model_z.php';
function fetchAllStudents()
{
    return showAllHistory();
}

//echo $_SESSION["loggedin"];
$admin = showAllHistory();

?>
<!DOCTYPE html>
<html>
<title>ALL Admins History</title>

<head>
    <link rel="stylesheet" type="text/css" href="css/style_Zahin.css?version=1">
    <title></title>
</head>

<body>
    <?php
    require_once './model_z.php';
    ?>
    <?php include 'headerAdmin.html'; ?>
    <h2 class="hAdminsInfo">ALL Rank History </h2>
    <table class="tableAdminsInfo">
        <thead>
            <tr id="trAdminsInfo trAdminsInfo2">
                <th class="thAdminsInfo">Updater</th>
                <th class="thAdminsInfo">Time</th>
                <th class="thAdminsInfo">Name</th>
                <th class="thAdminsInfo">Status</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($admin as $i => $admin) : ?>
                <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <tr id="trAdminsInfo">
                        <td class="tdAdminsInfo"><?php echo $admin['Updater'] ?></td>
                        <td class="tdAdminsInfo"><?php echo $admin['Time'] ?></td>
                        <td class="tdAdminsInfo"><?php echo $admin['Name'] ?></td>
                        <td class="tdAdminsInfo"><?php echo $admin['Status'] ?></td>
                    </tr>
                </form>
            <?php endforeach; ?>


        </tbody>


    </table>


</body>

</html>