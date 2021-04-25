<?php
session_start();

    include("../php/connection.php");
    include("../php/functions.php");

    $user_data = check_login($con);

    $selected_vehicle = selected_vehicle($con, $user_data['email']);

    $query = "SELECT * FROM `modification_log` WHERE `vehicle_id` = '$selected_vehicle[id]' ORDER BY `id` DESC";
    $result = mysqli_query($con, $query);
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
            <h1><span>MODIFICATIONS</span></h1>
        </div>

        <div id="content-container">
            <?php
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc())
                {
                    echo "<div class='modification-content'>";
                    echo "Part name: ", $row['part_name'], "<br>", "Part number: ",  $row['part_number'], "<br>", "Price: ", $row['price'], "<br>", "Mileage: ", $row['mileage'], "<br>", "Date: ", $row['date'], "<br>", "Comment: ", $row['comment'];
                    echo "</div>";
                }
            }
            else
            {
                echo "Add first modification log";
            }
            ?>
        </div>

        <div id="footer-container">
            <div class="icon-link">
                <a href="addModificationLog.php"><img id="addLog-icon" src="../images/addLog.png" alt="Add log icon"></a>
            </div>
            <div class="selected-vehicle-info">
                <?php
                if (!empty($selected_vehicle))
                {
                    echo $selected_vehicle['make'], " ", $selected_vehicle['model'], " ", $selected_vehicle['manufacture_year'];
                }
                else
                {
                    echo $selected_vehicle;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>