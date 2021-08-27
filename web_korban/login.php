<?php
session_name('session'); 
session_start();

require './config.php';

$error = false;

if(isset($_SESSION["user"])) {
    if($_SESSION['user']=='admin') {
        header("Location: admin.php");
        exit;
    }
}


if(isset($_POST["username"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) === 1) {
        
        $row = mysqli_fetch_assoc($result);

        if ($row["password"] == $password) {

            $_SESSION["user"] = 'admin';
            header("Location: admin.php");
            exit;
        }
    }

    $error = true;
}


?>




<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="http://<?= $url ?>/Exploiting cross-site scripting to steal cookies_files/academyLabHeader.css" rel="stylesheet">
        <link href="http://<?= $url ?>/Exploiting cross-site scripting to steal cookies_files/labs.css" rel="stylesheet">
        <title>Exploiting cross-site scripting to steal cookies</title>
    </head>
    <body>
            <script src="http://<?= $url ?>/Exploiting cross-site scripting to steal cookies_files/labHeader.js"></script>
            
            <div id="academyLabHeader">
                <section class="academyLabBanner">
                    <div class="container">
                    <div class="logo"></div>
                        <div class="title-container">
                            <h2>Exploiting cross-site scripting to steal cookies</h2>
                        </div>
                        <div class="widgetcontainer-lab-status is-notsolved">
                            <span>LAB</span>
                            <p>Not solved</p>
                            <span class="lab-status-icon"></span>
                        </div>
                    </div>
                </section>
            </div>

        <div theme="">
            <section class="maincontainer">
                <div class="container is-page">
                    <header class="navigation-header">
                        <section class="top-links">
                            <a href="http://<?= $url ?>/index.php">Home</a><p>|</p>
                            <a href="http://<?= $url ?>/login.php">My account</a><p>|</p>
                        </section>
                    </header>
                    <header class="notification-header">
                    </header>
                    <h1>Login</h1>
                    <section>
                        <form class="login-form" method="POST" action="http://<?= $url ?>/login.php">
                            <label>Username</label>
                            <input required="" type="username" name="username">
                            <label>Password</label>
                            <input required="" type="password" name="password">
                            <?php if($error): ?>
                                <span>Username dan Password Salah</span>
                                <br>
                            <?php endif ?>
                            <button class="button" type="submit"> Log in </button>
                        </form>
                    </section>
                </div>
            </section>
        </div>
    

</body></html>
