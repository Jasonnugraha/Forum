<?php
session_start();
    

    // connect to database

    $server = '127.0.0.1';
    $username = 'root';
    $password = 'root';
    $database = 'forum';

    $conn = mysqli_connect($server,$username,$password,$database);
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else
        // echo "Database Connection Sucess";
?>