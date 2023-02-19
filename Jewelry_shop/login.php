<?php
    session_start();
    include('connect.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    
    <div class="header">
        <h2>Login</h2>
    </div>

    <form action="login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text"  value="<?php if (isset($_COOKIE['user_login'])) { echo $_COOKIE['user_login']; } ?>" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" value="<?php if (isset($_COOKIE['user_password'])) { echo $_COOKIE['user_password']; } ?>" name="password">
        </div>
        <div class="input-group_2">
            <input type="radio" id="admin" name="user" value="admin"<?php if (isset($_COOKIE['user_admin'])) { ?> checked <?php } ?>>
            <label for="admin">Admin</label>
            <input type="radio" id="customer" name="user" value="customer" <?php if (isset($_COOKIE['user_customer'])) { ?> checked <?php } ?>>
            <label for="customer">Customer</label>
        </div>

        <div>
            <input type="checkbox" name="remember" <?php if (isset($_COOKIE['user_login'])) { ?> checked <?php } ?> id="remember">
            <lable for="remember">Remember me</lable>
        </div>

        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <p>Not yet a member? <a href="register.php">Sign Up</a></p>
    </form>

</body>
</html>