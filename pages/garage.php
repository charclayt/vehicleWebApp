<?php
session_start();

    include("../php/connection.php");
    include("../php/functions.php");

    $user_data = check_login($con);

    $query = "SELECT * FROM `vehicle_info` WHERE `user_email` = '$user_data[email]' ORDER BY `id`";
    $result = mysqli_query($con, $query);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $selected_vehicle = $_POST['selected_vehicle'];

        $result = mysqli_query($con, "SELECT * FROM `selected_vehicle` WHERE `user_email` = '$user_data[email]' LIMIT 1");

        if($result && mysqli_num_rows($result) > 0)
        {
            $query = "UPDATE `selected_vehicle` SET (`id`,`user_email`,`vehicle_id`)=('','$user_data[email]','$selected_vehicle') WHERE `user_email` = '$user_data[email]' LIMIT 1";

            mysqli_query($con, $query);

            die;
        }
        else
        {
            $query = "INSERT INTO `selected_vehicle` (`id`,`user_email`,`vehicle_id`) VALUES ('','$user_data[email]','$selected_vehicle')";

            mysqli_query($con, $query);

            die;
        }
    }
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
            <h1><span>GARAGE</span></h1>
        </div>

        <div id="content-container">
                <?php 
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
			            echo "<div class='garage-content'>";
                        echo "<form method='POST'>";
                        echo $row['make'] , " ", $row['model'], " ", $row['manufacture_year'] ,"<br>";
                        echo "<input type='hidden' id='selected_vehicle' name='selected_vehicle' value='{$row['id']}'>";
                        echo "<input type='submit' value='Select vehicle'>";
                        echo "</form>";
			            echo "</div>";
                    }
                }
                else
                {
                    echo "Please add new vehicle";
                }
                ?>
        </div>

        <div id="footer-container">
            <div class="icon-link">
                <a href="addVehicle.php"><img id="addLog-icon" src="../images/add.png" alt="Add log icon"></a>
            </div>
            <div class="content">
                
            </div>
        </div>
    </div>
</body>

</html>