<?php
    $servername = "us-cdbr-east-06.cleardb.net";
    $dBUsername = "bcda1914fdb60e";
    $dBPassword = "4e035ab1";
    $dBName = "heroku_2e6937e4e5ae220";

    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    if(!$conn){
        die("connection failed: ".mysqli_connect_error());
    }
?>

