<?php
$host = 'localhost';
$dbname = 'dbjs3vf0ibzc4q';
$username = 'ulnrcogla9a1t';
$password = 'yolpwow1mwr2';

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
