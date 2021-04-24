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
            <h1><span>ADD MODIFICATION LOG</span></h1>
        </div>

        <form method="POST">
        <fieldset>
            <ul>
                <li><label for="part-name">Part name</label>
                <input type="text" name="part-name" id="part-name"></li>
                <li><label for="part-number">Part number</label>
                <input type="text" name="part-number" id="part-number"></li>
                <li><label for="price">Price</label>
                <input type="number" name="price" id="price"></li>
                <li><label for="mileage">Mileage</label>
                <input type="number" name="mileage" id="mileage"></li>
                <li><label for="date">Date</label>
                <input type="date" name="date" id="date"></li>
                <li><textarea name="comment" id="comment">Comment</textarea>
            </ul>
            <p><input type="submit" value="Add modification log"></p>
        </fieldset>
        </fieldset>
        </form>
    </div>
</body>

</html>