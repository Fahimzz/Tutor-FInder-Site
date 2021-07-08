<!DOCTYPE HTML>
<html>


<head>
    <style>
        #form {
            display: block;
            text-align: left;
            position: relative;
            left: 35%;
            top: 0;
            font-size: 35px;
            font-weight: bold;
            color: white;
        }


        .header {
            text-align: center;
            font-size: 50px;
            color: white;
        }

        img {
            width: 300px;
        }

        body {
            background-image: url("back.jpg");
        }
    </style>
</head>




<h2 class="header"><u>Creators</u> </h2>
<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <table>
        <br>
        <tr>
            <td>
                <div id="names">Ashak Zahin Hasan</div>
                <br>
            </td>
            <td>
                <img src="z.jpg" alt="Italian Trulli">
                <br>
            </td>
        </tr>
        <br>
        <tr>
            <td>
                <img src="t.jpg" alt="Italian Trulli">
                <br>
            </td>
            <td>

                <div id="names">Tazin Ali</div>
                <br>
            </td>

        </tr>
        <br>
        <tr>
            <td>
                <div id="names">Israt Shukla</div>
                <br>
            </td>
            <td>
                <img src="i.jpg" alt="Italian Trulli">
                <br>
            </td>
        </tr>
        <br><br>
        <tr>
            <td>
                <img src="f.jpg" alt="Italian Trulli">
                <br>
            </td>
            <td>
                <div id="names">Fahim Mia</div>

            </td>
        </tr>
    </table>
</form>

</body>

</html>