<html>
<head>
    <meta charset="UTF-8">
    <link href="style/st_home.css" rel="stylesheet">
</head>

<?php 
session_start();
// if (!isset($_SESSION['username'])) {
// 	header("location:login.php");
// }
include "connect2.php"
?>
<br><br>
<div class="productall">
    <?php
        $keyword = $_GET["keyword"];
        $stmt=$pdo->prepare("SELECT * FROM product WHERE id_type='T004' AND name_product LIKE '%$keyword%'");
        $stmt->execute();

        while($row=$stmt->fetch()){
    ?>
        <div class="product">
            <a href="homepage.php?id_product=<?= $row["id_product"]?>">
                <img src='img_decorate/product1/<?= $row["id_product"]?>.jpg' width='220'>
            </a>
            <p class="product"><?= $row["price_product"]?> Baht</p>
            <p class="product"><?= $row["name_product"]?></p>
            <form method="post" action="realcart.php?action=add&id_product=<?=$row["id_product"]?>&name_product=<?=$row["name_product"]?>&price_product=<?=$row["price_product"]?>">
            <input type="number" name="num_product" value="1" min="1" max="9">
            <input type="submit" value="BUY" style="background-color : black; color: white;">	   
			</form><br>
            <!-- <a href="realcart.php" style="text-decoration: none;"><p class="buy">BUY</p></a> -->
        </div>
    <?php
        }
    ?>
</div><br><br>