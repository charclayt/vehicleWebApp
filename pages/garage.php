<?php
session_start();

    include("../php/connection.php");
    include("../php/functions.php");

    $user_data = check_login($con);

    $query = "SELECT * FROM `vehicle_info` WHERE `user_email` = '$user_data[email]' ORDER BY `id`";
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
            <h1><span>GARAGE</span></h1>
        </div>

        <div id="content-container">
                <?php 
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
			            echo "<div class='content'>";
                        echo $row['make'] ,$row['model'], $row['manufacture_year'] ,"<br>";
			            echo "</div>";
                    }
                }
                else
                {
                    echo "please add new vehicle";
                }
                ?>
            <div class="content">

            </div>
            <div class="content">

            </div>
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