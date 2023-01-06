<?php
include ('vendor/autoload.php');
session_start();
require ('init.php');
if(isset($_POST['login'])){
    if($_POST['username'] == '' OR $_POST['password'] == ''){
        echo 'Password cannot be empty';
    } else {
        $username = strip_tags(trim($_POST['username']));
        $password = strip_tags(trim($_POST['password']));
        $query = $db->prepare('SELECT * FROM tb_users WHERE username=? AND password=?');
        $query->execute(array($username, $password));
        $control = $query->fetch($PDO::FETCH_OBJ);
        if ($control > 0){
            $_SESSION['username'] = $username;
            header('Location: index.php');  
        }


    }
}

?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <form method="POST">
                <div class="container">
                    <label>Username</label>
                    <input type="text" name="username">
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