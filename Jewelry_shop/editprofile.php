<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
include "connect2.php"
?>

<?php
    $stmt=$pdo->prepare("UPDATE customer JOIN email_customer 
    ON customer.username_cus=email_customer.username_cus 
    JOIN tel_customer ON customer.username_cus=tel_customer.username_cus
    SET customer.password_cus=?, customer.name_cus=?,
    customer.surname_cus=?, customer.address_cus=?, email_customer.email_cus=?,
    tel_customer.tel_cus=? WHERE customer.username_cus=?");
    $stmt->bindParam(1, $_POST["password"]);
    $stmt->bindParam(2, $_POST["name"]);
    $stmt->bindParam(3, $_POST["surname"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["email"]);
    $stmt->bindParam(6, $_POST["tel"]);
    $stmt->bindParam(7, $_POST["username"]);
    if($stmt->execute()){
        header("location:profile.php");
    }
?>