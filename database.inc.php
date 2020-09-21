<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "railway_reservation";

    $con = mysqli_connect($host,$user,$pass,$db);

    if(!$con){
        die("Database Connection Error");
    }
?>