<?php
session_start();
# conexión
$conn = mysqli_connect(
    'localhost',
    'root',
    'secret',
    'todo'
);

if (isset($conn)) {
    echo ':), OK!';
}
