<?php

function check_login($con)
{
    if (isset($_SESSION['id']))
    {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1";

        $result = mysqli_query($con,$query);

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login

    header("location: ../pages/login.php");
    die;
}

function selected_vehicle($con, $user_email)
{
    $query1 = mysqli_query($con, "SELECT `vehicle_id` FROM `selected_vehicle` WHERE `user_email` = '$user_email' LIMIT 1");
    $query1_result = mysqli_fetch_assoc($query1);

    if($query1_result !=null )
    {
        $query2 = "SELECT * FROM `vehicle_info` WHERE `id` = '$query1_result[vehicle_id]' LIMIT 1";

        $result = mysqli_query($con, $query2);

        $final = mysqli_fetch_assoc($result);

        return $final;   
    }

    else
    {
        return null;
        die;
    }
}