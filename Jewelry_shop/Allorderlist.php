
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
$stmt = $pdo->prepare("SELECT ROW_NUMBER() OVER (ORDER BY po.date_order, po.time_order, po.username_cus, po.id_product) row_order, po.date_order, po.username_cus,SUM(po.qty_product * product.price_product) AS sum_price FROM po 
JOIN product ON po.id_product = product.id_product 
GROUP BY po.date_order, po.time_order, po.username_cus;
");
$stmt->execute();
while ($row = $stmt->fetch()) {


echo "ออเดอร์ที่" .$row ["row_order"]."<br>";
echo "วันที่สั่งสินค้า:" .$row ["date_order"]. "<br>";
echo "ชื่อสมาชิก: " .$row ["username_cus"]."<br>";
echo "ราคารวม: " .$row ["sum_price"]. "<br><hr>";
// echo "ที่อยู่: " .$row ["address_cus"]. "<br>";
// echo "ราคาทั้งหมด: " .$row ["sum_price"]. "<br>";
// echo "สถานะ: " .$row ["payment_status"]. "<br><hr>";

 } ?>
</div>
</body>
</html>