<?php 
    
    include('register_db.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
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
            <label for="name">name</label>
            <input type="text" name="name" 
            pattern="[ก-๏]+" 
            require>
        </div>
        <div class="input-group">
            <label for="surname">surname</label>
            <input type="text" name="surname" 
            pattern="[ก-๏]+"
            require>
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" 
            pattern=".{4,}" 
            title="username 4 ตัวอักษรขึ้นไป"require>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" 
            require>
        </div>
        <div class="input-group">
            <label for="tel_cus">Tel</label>
            <input type="tel" name="tel_cus" 
            require>
        </div>
        <div class="input-group">
            <label for="address_cus">Address</label>
            <input type="text" name="address_cus" 
            require>
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{4,}$" 
            title="ตัวพิมพ์ใหญ่/ตัวพิมพ์เล็ก/ตัวเลข ต้องมีอย่างน้อย 1 ตัวและรหัสผ่าน4ตัวขึ้นไป"
            require>
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{4,}$"
             title="ตัวพิมพ์ใหญ่/ตัวพิมพ์เล็ก/ตัวเลข ต้องมีอย่างน้อย 1 ตัวและรหัสผ่าน4ตัวขึ้นไป"
             require>
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>

</body>
</html>