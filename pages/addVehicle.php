<?php
session_start();

    include("../php/connection.php");
    include("../php/functions.php");

    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_id = $user_data['email'];
        $make = $_POST['vehicle-make'];
        $model = $_POST['vehicle-model'];
        $year = $_POST['vehicle-manufacture-year'];

        if(!empty($make) && !empty($model) && !empty($year))
        {
            $query = "INSERT INTO `vehicle_info` (`id`, `user_email`, `make`, `model`, `manufacture_year`, `image_filename`) VALUES ('', '$user_id', '$make', '$model', '$year', '')";

            mysqli_query($con, $query);

            header("Location: ../pages/garage.php");
            die;
        }

        else
        {
            echo "please complete information fields";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formstyle.css">
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
            <h1><span>ADD VEHICLE</span></h1>
        </div>

        <form method="POST" id="add_vehicle_form">
            <fieldset>
                <ul>
                    <li><label for="vehicle-make">Make:</label>
                    <br>
                    <input type="text" name="vehicle-make" id="vehicle-make"></li>
                    <br>
                    <br>
                    <li><label for="vehicle-model">Model:</label>
                    <br>
                    <input type="text" name="vehicle-model" id="vehicle-model"></li>
                    <br>
                    <br>
                    <li><label for="vehicle-manufacture-year">Year of manufacture:</label>
                    <br>
                    <input type="number" name="vehicle-manufacture-year" id="vehicle-manufacture-year"></li>
                    <br>
                    <br>
                </ul>
                <p><input type="submit" value="Add vehicle"></p>
            </fieldset>
        </form>
    </div>
</body>
</html>