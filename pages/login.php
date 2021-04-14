<?php
session_start();

    include("connection.php");
    include("functions.php");
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

        </header>

        <form action="../php/login.php" method="POST">
            <!-- <fieldset>
                <legend>Welcome back!</legend>
                <ul>
                    <li><label for="form-login-email">Email:</label>
                    <input type="email" name="email" id="form-login-email"></li>
                    <li><label for="form-login-password">Password:</label>
                    <input type="password" name="password" id="form-login-password"></li>
                </ul>
                <p><input type="submit" value="Log in"></p>
                <a href="../pages/signup.html">Sign Up</a>
            </fieldset> -->
            <input type="email" name="email" id="form-login-email"><br>
            <input type="password" name="password" id="form-login-password"><br>

            <input type="submit" value="Log in"><br>

            <a href="../pages/signup.html">Sign Up</a>
        </form>
    </div>
</body>

</html>