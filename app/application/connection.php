<?php
    $config = require __DIR__.'/../../config.php';
    extract($config['database']);

    $conn = mysqli_connect($host, $username, $password, $database);
    if(!$conn){
        die("connection failed" . mysqli_connect_error());
    }
?>