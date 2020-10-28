<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "banco_redacao"; 


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>