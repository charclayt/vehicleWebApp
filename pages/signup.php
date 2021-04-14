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
            $query = "insert into users (email,password) values ('$user_name','$password')";

            mysqli_query($con, $query);

            header("location: ../pages/login.php");
            die;
        }
            
        else
        {
            echo "please enter valid information";
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

        </header>

        <form action="../php/signup.php" method="POST">
            <fieldset>
                <legend>Sign up</legend>
                <ol>
                    <li><label for="email">Email:</label>
                    <input type="email" name="email" id="email"></li>
                    <li><label for="password">Password:</label>
                    <input type="password" name="password" id="password"></li>
                </ol>
                <p><input type="submit" value="Sign up"></p>
            </fieldset>
        </form>
    </div>
</body>

</html>