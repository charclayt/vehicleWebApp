<?php
session_start();

    include("../php/connection.php");
    include("../php/functions.php");

    $user_data = check_login($con);

    $selected_vehicle = selected_vehicle($con, $user_data['email']);

    $query = "SELECT * FROM `vehicle_info` WHERE `user_email` = '$user_data[email]' ORDER BY `id`";
    $result = mysqli_query($con, $query);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $select_vehicle = $_POST['select_vehicle'];

        $result = mysqli_query($con, "SELECT * FROM `selected_vehicle` WHERE `user_email` = '$user_data[email]' LIMIT 1");

        if($result && mysqli_num_rows($result) > 0)
        {
            $query = "UPDATE `selected_vehicle` SET `vehicle_id`='$select_vehicle' WHERE `user_email` = '$user_data[email]' LIMIT 1";

            mysqli_query($con, $query);

            header ("Location: ../pages/home.php");
            die;
        }
        else
        {
            $query = "INSERT INTO `selected_vehicle` (`id`,`user_email`,`vehicle_id`) VALUES ('','$user_data[email]','$select_vehicle')";

            mysqli_query($con, $query);

            header ("Location: ../pages/home.php");
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
    <link rel="stylesheet" href="../css/stylesheet.css?ts=<?=time()?>">
    <title></title>
</head>

<body>
    <div class="container">
        <div id="garage-title-container">
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
                        echo "<p>", $row['make'] , " ", $row['model'], " ", $row['manufacture_year'] ,"</p>", "<br>";
                        echo "<input type='hidden' id='select_vehicle' name='select_vehicle' value='{$row['id']}'>";
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
            <div class="selected-vehicle-info">
                <?php
                if (!empty($selected_vehicle))
                {
                    echo $selected_vehicle['make'], " ", $selected_vehicle['model'], " ", $selected_vehicle['manufacture_year'];
                }
                else
                {
                    echo "Select a vehicle";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>