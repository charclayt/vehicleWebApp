<?php
session_start();

    include("../php/connection.php");
    include("../php/functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <title></title>
</head>

<body>
    <div class="container">
        <header id="header">
            <nav class="menu">
                <ul>
                    <li><a href="maintenance.php"><img id="icon" src="../images/maintenance.png" alt="Maintenance icon"></a></li>
                    <li><a href="home.php"><img id="icon" src="../images/home.png" alt="Home icon"></a></li>
                    <li><a href="modifications.php"><img id="icon" src="../images/modifications.png" alt="Modification icon"></a></li>
                </ul>
            </nav>
        </header>

        <div id="title-container">
            <h1><span>MAINTENANCE</span></h1>
        </div>

        <div id="content-container">
            <div class="content">

            </div>
            <div class="content">

            </div>
            <div class="content">

            </div>
        </div>

        <div id="footer-container">
            <div class="icon-link">
                <a href="addMaintenanceLog.php"><img id="addLog-icon" src="../images/addLog.png" alt="Add log icon"></a>
            </div>
            <div class="selected-vehicle-info">
                <p>Vehicle selected info</p>
            </div>
        </div>
    </div>
</body>

</html>