<?php 
    session_start();
    include('connect.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $name = mysqli_real_escape_string($pdo, $_POST['name']);
        $surname = mysqli_real_escape_string($pdo, $_POST['surname']);
        $username = mysqli_real_escape_string($pdo, $_POST['username']);
        $email    = mysqli_real_escape_string($pdo, $_POST['email']);
        $address_cus    = mysqli_real_escape_string($pdo, $_POST['address_cus']);
        $tel_cus    = mysqli_real_escape_string($pdo, $_POST['tel_cus']);
        $password_1 = mysqli_real_escape_string($pdo, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($pdo, $_POST['password_2']);
        
        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM customer WHERE username_cus = '$username' LIMIT 1";
        $query = mysqli_query($pdo, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
        }
        if ($result) { // if user exists
            if ($result['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
        if ($result) { // if user exists
            if ($result['tel_cus'] === $tel_cus) {
                array_push($errors, "Phone number already exists");
            }
        }

        if (count($errors) == 0) {
            $password = $password_1;
            $sql = "INSERT INTO customer (username_cus, password_cus,name_cus,surname_cus,address_cus) VALUES ('$username', '$password','$name','$surname','$address_cus')";
            mysqli_query($pdo, $sql);
            $sql = "INSERT INTO email_customer(username_cus,email_cus) VALUES ('$username','$email')";
            mysqli_query($pdo, $sql);
            $sql = "INSERT INTO tel_customer(username_cus,tel_cus) VALUES ('$username','$tel_cus')";
            mysqli_query($pdo, $sql);
            $_SESSION['username'] = $username;
            header('location: login.php');
        } else {
            header("location: register.php");
        }
    }

?>