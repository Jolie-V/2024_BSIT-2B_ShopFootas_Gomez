<!DOCTYPE html>
<html lang="en">
<?php include_once "db.php";

session_start();
?>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="loginup">
    <div class="container">
        <div class="row justify-content-between">
            <div class="content-left">
                <h1>ShopFootas</h1>
                <h2>Looking for comfortable and affordable shoes? Shop now at ShopFootas! </h2>
            </div>

            <div class="content-right">
                <form action="process_login.php" method="POST">
                <div class="input-group">    
                <h1>ShopFootas</h1>
                        <input name="f_username" type="text" placeholder="username" required>

                        <input name="f_password" type="password" placeholder="password" required>

                        <input type="submit" value="login" class="btn btn-success">
                    </div>
                   
                    <div class="line"></div>

                </form>

                <div class="signup-btn">
                    <a href="sign_up.php" class="btn">
                    <button class="button">Signup</button>
                    </a>
                </div>
                    <a href="visitor_homepage.php">Login Later</a>
            </div>
        </div>
    </div>
</div>    
</body>
</html>