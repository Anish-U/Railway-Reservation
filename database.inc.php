<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dbms";

    $con = mysqli_connect($host,$user,$pass,$db);

    if(!$con){
        die("Database Connection Error");
    }
?>