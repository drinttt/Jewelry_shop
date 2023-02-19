
<?php include "connect2.php"?>
<html>
<head><meta charset="utf-8">
<link href="style/style_ad.css" rel="stylesheet"> 
</head>
<body>
    <header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
    <nav>
    <a href="homead.php">BACK</a>
    </nav>
<div class="list">
<?php
$stmt = $pdo->prepare("SELECT po.username_cus,customer.name_cus,customer.surname_cus,customer.address_cus,po.date_order,po.time_order,po.id_product,product.name_product,po.qty_product,SUM(po.qty_product*product.price_product)AS sum_price,po.payment_status
FROM customer JOIN po ON customer.username_cus=po.username_cus 
JOIN product ON po.id_product = product.id_product
GROUP BY customer.name_cus,customer.surname_cus,customer.address_cus,id_product,po.date_order,po.date_order  
ORDER BY `po`.`date_order` DESC");
$stmt->execute();
while ($row = $stmt->fetch()) {


echo "วันที่สั่งสินค้า" .$row ["date_order"]."<br>";
echo "เวลา:" .$row ["time_order"]. "<br>";
echo "ชื่อ: " .$row ["name_cus"]."<br>";
echo "นามสกุล: " .$row ["surname_cus"]. "<br>";
echo "ที่อยู่: " .$row ["address_cus"]. "<br>";
echo "ชื่อสินค้า: " .$row ["name_product"]. "<br>";

echo "จำนวนสินค้าที่สั่ง: " .$row ["qty_product"]. "<br>";

echo "ราคาสินค้า: " .$row ["sum_price"]. "<br>";
echo "สถานะ: " .$row ["payment_status"]. "<br>";

// realcart.php?action=add&id_product=2&name_product=สร้อยเงินลายไม้กางเขน&price_product=550
// echo "<a href='editformproduct.php?id_product=".$row ["id_product"]."'>แก้ไข</a> <hr>";
echo "<a href='edit_orderlist.php?date_order=".$row ["date_order"]."&time_order=".$row["time_order"]."&qty_product=".$row["qty_product"]."&username_cus=".$row["username_cus"]."&id_product=".$row["id_product"]."&payment_status=".$row["payment_status"]."'>แก้ไข</a> <hr>";
// "&payment_status=".$row["payment_status"].

// date_order	
// time_order	
// qty_product	
// username_cus	
// id_product	
// payment_status

 } ?>
</div>
</body>
</html>