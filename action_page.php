<?php
if (isset($_POST['access_hidden'])) {
    switch ($_POST['access_hidden']) {
        case "method_name":
            method_name();
            break;
            //case "blue": métodos from value
            //echo "Your favorite color is blue!";
            //break;
        default:
            echo "<3";
    }
}
//if (isset($_POST['access'])) {
function method_name()
{
    //extract($_POST);
    include('db.php');
    /*session_start();

    if (isset($_SESSION['rol'])) {
        switch ($_SESSION['rol']) {
            case 1:
                header('Location: index.php');
                break;
            case 2:
                header('Location: idrols.php');
                break;
            default:
                echo "No Rol";
        }
    }*/
    $n = $_POST['uname'];
    $p = $_POST['psw'];
    session_start();

    $_SESSION['uname'] = $n;

    $query = "select * from user where email = '$n' and pass = '$p'";
    $result = $conn->query($query);
    //$row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if ($row) {
        header('Location: index.php');
        //if ($row['id_rol'] == 1) {
        /*if ($row == true) {
        $rol = $row['id_rol'];
        $_SESSION['rol'] = $rol;
        switch ($_SESSION['rol']) {
            case 1:
                header('Location: index.php');
                break;
            case 2:
                header('Location: idrols.php');
                break;
            default:
                echo "No Rol";
        }
    }*/ /*else if ($row['id_rol'] == 2) {
        header('Location: idrols.php');
    } */
    } else {
        header('Location: login.php');
        session_destroy();
        //echo "mal";
    }
}
//}
