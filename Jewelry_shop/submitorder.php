<head>
    <meta charset="UTF-8">
</head>
<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
include "connect2.php";
?>
<?php
    foreach($_SESSION["cart"] as $item => $pd){
        $stmt=$pdo->prepare("INSERT INTO po VALUES (?,?,?,?,?,?)");
        $stmt->bindParam(1,$_POST["pdate"]);
        $stmt->bindParam(2,$_POST["ptime"]);
        $stmt->bindParam(3,$pd['num_product']);
        $stmt->bindParam(4,$_SESSION['username']);
        $stmt->bindParam(5,$pd['id_product']);
        $stmt->bindParam(6,$_POST["pm_status"]);
        $stmt->execute();

        $stmt1=$pdo->prepare("SELECT*from product where id_product=$pd[id_product]");
        $stmt1->execute();
        $row=$stmt1->fetch();

        $newqty=$row['num_product']-$pd['num_product'];

        $stmt2=$pdo->prepare("UPDATE product SET num_product = ? where id_product = ?");
        $stmt2->bindParam(1,$newqty);
        $stmt2->bindParam(2,$pd['id_product']);
        $stmt2->execute();

        echo "<script>alert('สั่งซื้อสินค้าเรียบร้อย');window.location.href = 'homepage.php';</script>";
    }
?>

