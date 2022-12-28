<?php
include ('vendor/autoload.php');
require ('init.php');
use App\User;

$getLoginInfo = new User('');
$getLoginInfo->setConnection($connection);

?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <form method="POST">
                <div class="container">
                    <label>Email</label>
                    <input type="email" name="email_address">
                </div>
                <div class="container">
                    <label>Password</label>
                    <input type="text" name="password">
                </div>
                <input type="submit" class="btn" value="Login" name="login">
            </form>
            <a href="register.php">Register</a>
        </div>
    </body>
</html>

<?php

if(isset($_POST['login'])) {

    $loginInfo = $getLoginInfo->login($_POST['email_address'], $_POST['password']);
    header("Location: dashboard.php");
    exit();

}

?>