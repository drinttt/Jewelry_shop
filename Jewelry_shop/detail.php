<?php include "connect2.php"?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>detail product</title>
</head>
<body>
    <?php 
    $stmt =$pdo->prepare("SELECT * FROM product WHERE product.id_product =?");
    $stmt->bindparam(1,$_GET["id_product"]);
    $stmt->execute();
    ?>
    
    <h1>รายละเอียดสินค้า</h1>
    <br>
    
    <?php
    while($row = $stmt->fetch()){
    ?>
   
   <img src='img_decorate/product1/<?= $row["id_product"]?>.jpg' width='200'>
 <br>ชื่อสินค้า: <?=$row["name_product"]?><br>
 จำนวนคงเหลือ: <?=$row["num_product"]?><br>
 ราคา:   <?=$row["price_product"]?><br>
    
    
    
    
 
    <?php
    }?>
  
</body>
</html>