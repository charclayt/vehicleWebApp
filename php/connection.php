<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "vehiclewebapp";

$con = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

if ($con->connect_error)
{
    die("connection failed!" . $con->connect_error);
}

