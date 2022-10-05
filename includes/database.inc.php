<?php

$servername = "localhost";
$dbusername = "lhyo";
$dbpassword = "abc123";
$dbname = "blog_system";


try {
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
} catch (\Exception $e) {
    echo "Connection Failed: ". $e->getMessage();
    exit;
}