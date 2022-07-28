<?php

$server = "localhost";
$usernameDB = "root";
$passwordDB = "";
$nameDB  = "cloud_pi";

try {
    $conn = new PDO("mysql:host=$server;dbname=$nameDB", $usernameDB, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
    
