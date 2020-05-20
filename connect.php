<?php
    // connect to database

    $server = '127.0.0.1';
    $username = 'root';
    $password = 'root';
    $database = 'forum';

    mysqli_connect($server,$username,$password,$database);
    if(mysqli_connect_error())
        echo "Connection Error";
    else
        echo "Database Connection Sucess";
?>