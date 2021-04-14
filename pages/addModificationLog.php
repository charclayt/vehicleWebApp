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
                    <li><a href="maintenance.html"><img id="icon" src="../images/maintenance.png" alt="Maintenance icon"></a></li>
                    <li><a href="home.html"><img id="icon" src="../images/home.png" alt="Home icon"></a></li>
                    <li><a href="modifications.html"><img id="icon" src="../images/modifications.png" alt="Modification icon"></a></li>
                </ul>
            </nav>
        </header>

        <div id="title-container">
            <h1><span>ADD MODIFICATION LOG</span></h1>
        </div>

        <form action="../php/addModificationLog.php" method="POST">
        <fieldset>
            <ol>
                <li><label for=""></label></li>
            </ol>
        </fieldset>
        </form>
    </div>
</body>

</html>