<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    error_reporting(0);

    if (isset($_SESSION['uname'])) {
        //header("Location: login.php");
        //echo "OJO";
        if ($_SESSION['rol'] == 1) {
            header("Location: index.php");
            die();
        }
        if ($_SESSION['rol'] == 2) {
            header("Location: idrols.php");
            die();
        }
    } ?>
    <form action="action_page.php" method="post">
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <input type="hidden" name="access_hidden" value="method_name">
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>