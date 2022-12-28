<?php
include ('vendor/autoload.php');
require ('init.php');
use App\User;

?>

<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <div class="container">
            <form method="POST">
            <div class="container">
                    <label>First Name</label>
                    <input type="text" name="first_name">
                </div>
                <div class="container">
                    <label>Last Name</label>
                    <input type="text" name="last_name">
                </div>
                <div class="container">
                    <label>Username</label>
                    <input type="text" name="username">
                </div>
                <div class="container">
                    <label>Email</label>
                    <input type="email" name="email_address">
                </div>
                <div class="container">
                    <label>Password</label>
                    <input type="text" name="password">
                </div>
                <input type="submit" class="btn" value="Register" name="register">
            </form>
        </div>
    </body>
</html>

<?php

if(isset($_POST['register'])) {

    
    $registerUser = new User($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['email_address'], $_POST['password']);
    $registerUser->setConnection($connection);
    $registerUser->save();
    header("Location: login.php");
    exit();

}

?>