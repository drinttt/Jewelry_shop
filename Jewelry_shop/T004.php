
<?php include "connect2.php"?>
<html>
<head><meta charset="utf-8">
<link href="style/style_ad.css" rel="stylesheet"> 
</head>
<body>
<header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
    
<nav>
    <a href="homead.php">BACK</a><a href="T001.php">Necklace</a><a href="T002.php">Ring</a><a href="T003.php">Earring</a><a href="T004.php">Bracelet</a>
    </nav>
<section class=T00>
<?php
$stmt = $pdo->prepare("SELECT * FROM `product` WHERE id_type='T004'");
$stmt->execute();
while ($row = $stmt->fetch()) {
?>
<article class="detailpro">
<img src='img_decorate/product1/<?= $row["id_product"]?>.jpg' width='200'><br>
รหัสสินค้า:<?=$row["id_product"]?><br>
ชื่อสินค้า:<?=$row ["name_product"]?><br>
ราคาสินค้า:<?=$row ["price_product"]?><br>
จำนวน:<?=$row ["num_product"]?><br>
ประเภทสินค้า:<?=$row ["id_type"]?><br>
</article>
<?php 
} ?>
</section>
</body>
</html>