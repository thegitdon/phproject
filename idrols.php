<?php
echo "No Admin";
session_start();
error_reporting(0);
//identificar usuario por medio de...
// $varsesion = $_SESSION['uname'];

/*if (!isset($_SESSION['rol'])) {
    header("Location: login.php");
} else {
    if ($_SESSION['rol'] != 1) {
        header("Location: login.php");
    }
}*/
if (!isset($_SESSION['uname'])) {
    //header("Location: login.php");
    //echo "OJO";
    header("Location: login.php");
    die();
}
