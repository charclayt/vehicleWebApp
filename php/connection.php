<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "vehiclewebapp";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))
{
    die("failed to connect!");
}

