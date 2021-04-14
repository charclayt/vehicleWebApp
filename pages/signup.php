<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['form-signup-email'];
        $password = $_POST['form-signup-password'];

        if(!empty($user_name) && !empty($password))
        {
            //save to database
            $query = "insert into users (email,password) values ('$user_name','$password')";

            mysqli_query($con, $query);

            header("location: login.html");
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
                    <li><label for="form-signup-email">Email:</label>
                    <input type="email" name="email" id="form-signup-email"></li>
                    <li><label for="form-signup-password">Password:</label>
                    <input type="password" name="password" id="form-signup-password"></li>
                </ol>
                <p><input type="submit" value="Sign up"></p>
            </fieldset>
        </form>
    </div>
</body>

</html>