<?php
session_start();
$conn = new mysqli(
    'localhost',
    'root',
    'secret',
    'todo'
);

if ($conn->connect_errno) { //connect_error
    //die("Connection failed: " . $db->connect_error);
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
    //error_log('Connection error: ' . $conn->connect_error);
}
