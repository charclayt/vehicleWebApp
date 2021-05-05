<?php
session_start();

    include("../php/connection.php");
    include("../php/functions.php");

    $user_data = check_login($con);

    $selected_vehicle = selected_vehicle($con, $user_data['email']);

    $maintenance_query = mysqli_query($con, "SELECT * FROM `maintenance_log` WHERE `vehicle_id` = '$selected_vehicle[id]' ORDER BY `id` DESC LIMIT 1");
    $maintenance_result =  mysqli_fetch_assoc($maintenance_query);

    $modification_query = mysqli_query($con, "SELECT * FROM `modification_log` WHERE `vehicle_id` = '$selected_vehicle[id]' ORDER BY `id` DESC LIMIT 1");
    $modification_result = mysqli_fetch_assoc($modification_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesheet.css?ts=<?=time()?>">
    <script src="../javascript/homeScript.js"></script>
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
            <h1><span>HOME</span></h1>
        </div>

        <div id="content-container">
            <div class="content">
                <h2>Recent maintenance</h2>
                <?php
                if(!empty($maintenance_result))
                {
                    echo "<div id='recent_maintenance_home'>";
                    echo "<p>", "Part name: ", $maintenance_result['part_name'], "<br>", "Mileage: ", $maintenance_result['mileage'], "<br>", "Date: ", $maintenance_result['date'], "</p>";
                    echo "</div>";
                }
                else
                {
                    echo "<p>", "Enter your first maintenance log to view most recent here!", "</p>";
                }
                ?>
            </div>
            <div class="content">
                <h2>Recent modification</h2>
                <?php
                if(!empty($modification_result))
                {
                    echo "<div id='recent_modification_home'>";
                    echo "<p>", "Part name: ", $modification_result['part_name'], "<br>", "Mileage: ", $modification_result['mileage'], "<br>", "Date: ", $modification_result['date'], "</p>";
                    echo "</div>";
                }
                else
                {
                    echo "<p>", "Enter your first modification log to view most recent here!", "</p>";
                }
                ?>
            </div>
            <div class="content">
                <h2>Savings tracker</h2>
                <p>Hello, <?php echo $user_data['email']; ?></p>
                <p> <a href="../php/logout.php">Logout</a></p>
            </div>
        </div>

        <div id="footer-container">
            <div class="icon-link">
                <a href="garage.php"><img id="garage-icon" src="../images/garage.png" alt="Garage icon"></a>
            </div>
            <div class="selected-vehicle-info">
            <?php
                if (!empty($selected_vehicle))
                {
                    echo $selected_vehicle['make'], " ", $selected_vehicle['model'], " ", $selected_vehicle['manufacture_year'];
                }
                else
                {
                    echo "Please select vehicle";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>