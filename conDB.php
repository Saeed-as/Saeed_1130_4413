<?php


    $servername = "localhost";
    $username = "saeeda";
    $password = "yHglz5fse2KyxhK";
    $dbname = "seu_saeed_874413";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?> 