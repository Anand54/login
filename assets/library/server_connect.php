<?php
function dbConnecting()
{
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'demo';
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if (!$conn) {
        echo "unable to connect database";
        die();
    }
    else {
        return $conn;
    }
}
?>