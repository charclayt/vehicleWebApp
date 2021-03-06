<?php
session_start();

    include("../php/connection.php");
    include("../php/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password))
        {
            //save to database
            $query = "INSERT INTO `users` (`id`,`email`,`password`) VALUES ('','$user_name','$password')";

            mysqli_query($con, $query);

            header("Location: ../pages/login.php");
            die;
        }
            
        else
        {
            echo "<p id='error_message'>", "please enter valid information", "</p>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formstyle.css?ts=<?=time()?>">
    <title></title>
</head>

<body>
    <div class="container">
        <header id="signup_header">

        </header>

        <form method="POST" id="signup_form" autocomplete="off">
            <div id="logo_container">
                <img id="logo" src="../images/logo.png" alt="logo">
            </div>
                
            <ul>
                <li><label for="email">Email:</label>
                <br>
                <input type="email" name="email" id="email"></li>
                <br>
                <li><label for="password">Password:</label>
                <br>
                <input type="password" name="password" id="password"></li>
                <br>
            </ul>
                <p><input type="submit" value="Sign up"></p>
        </form>
    </div>
</body>

</html>