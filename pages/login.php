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
            $query = "SELECT * FROM `users` WHERE `email` = '$user_name' LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result)
            {
                if ($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['password'] === $password)
                    {
                        $_SESSION['id'] = $user_data['id'];
                        header("Location: ../pages/garage.php");
                        die;
                    }
                }
            }

            echo "Wrong username or Password!";      
        }
            
        else
        {
            echo "Wrong username or Password!";
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

        <form method="POST" id="login_form">
            <fieldset>
                <legend>Welcome back!</legend>
                <ul>
                    <li><label for="form-login-email">Email:</label>
                    <input type="email" name="email" id="form-login-email"></li>
                    <li><label for="form-login-password">Password:</label>
                    <input type="password" name="password" id="form-login-password"></li>
                </ul>
                <p><input type="submit" value="Log in"></p>
                <a href="./signup.php">Sign Up</a>
            </fieldset>
            <!-- <input type="email" name="email" id="email"><br>
            <input type="password" name="password" id="password"><br>

            <input type="submit" value="Log in"><br>

            <a href="./signup.php">Sign Up</a> -->
        </form>
    </div>
</body>

</html>