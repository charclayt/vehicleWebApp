<?php

include("signup.html");

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