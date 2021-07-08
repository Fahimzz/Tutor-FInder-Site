<?php
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
    return showAll();
}

$admin = showAll();

?>
<!DOCTYPE html>
<html>
<title>ALL Admins Info</title>

<head>
    <link rel="stylesheet" type="text/css" href="css/style_Zahin.css?version=1">
    <title></title>
</head>

<body>
    <?php
    require_once './model_z.php';
    //$_SESSION["typeF"] = "admin"; //////////////////////////
    ?>
    <?php include 'headerAdmin.html'; ?>
    <h2 class="hAdminsInfo">ALL Information of Admins and Moderator</h2>
    <table class="tableAdminsInfo">
        <thead>
            <tr id="trAdminsInfo trAdminsInfo2">
                <th class="thAdminsInfo">Name</th>
                <th class="thAdminsInfo">Email</th>
                <th class="thAdminsInfo">Phone</th>
                <th class="thAdminsInfo">Gender</th>
                <th class="thAdminsInfo">Rank</th>
                <th class="thAdminsInfo">Action</th>
                <th class="thAdminsInfo">Change Rank</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($admin as $i => $admin) : ?>
                <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <tr id="trAdminsInfo">
                        <td class="tdAdminsInfo"><?php echo $admin['Name'] ?></td>
                        <td class="tdAdminsInfo"><?php echo $admin['Email'] ?></td>
                        <td class="tdAdminsInfo"><?php echo $admin['Phone'] ?></td>
                        <td class="tdAdminsInfo"><?php echo $admin['Gender'] ?></td>
                        <td class="tdAdminsInfo"><?php echo $admin['Type'] ?></td>
                        <td class="tdAdminsInfo" id="tdAdminsInfo2"><a href="removeAdmin.php?Email=<?php echo $admin['Email'] ?>" onclick="return confirm('do you want to delete Y/N')">Delete</a></td>
                        <td class="tdAdminsInfo"><a href="changeRank.php?Email=<?php echo $admin['Email'] ?>&Type=<?php echo $admin['Type'] ?>&Name=<?php echo $admin['Name'] ?>" onclick="return confirm('do you want to change Y/N')">
                                <?php
                                if ($admin['Type'] == "admin") {
                                    echo "Demosion";
                                } else {
                                    echo "Promotion";
                                }
                                ?>
                            </a></td>
                    </tr>
                </form>
            <?php endforeach; ?>


        </tbody>


    </table>


</body>

</html>