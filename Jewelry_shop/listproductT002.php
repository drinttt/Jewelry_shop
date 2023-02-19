<?php include "connect2.php"?>
<html>
<head><meta charset="utf-8">
    <script src="https://kit.fontawesome.com/ea69c221e1.js" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(id_product){
            var ans=confirm("ต้องการลบสมาชิก" + id_product);
            if (ans==true)
            document.location ="deleteproduct.php?id_product="+id_product;
        }
    </script>
    <link href="style/style_ad2.css" rel="stylesheet"> 
</head>
<body>
<header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
<nav>
    <ul class="navbar">
        <a href="homead.php">BACK  </a>
        <a href="listproductT001.php">Necklace</a>
        <a href="listproductT002.php">Ring</a>
        <a href="listproductT003.php">Earring</a>
        <a href="listproductT004.php">Bracelace</a>
    </ul>
</nav>
<div class="list">
<?php
$stmt = $pdo->prepare("SELECT * FROM product WHERE id_type='T002' ");
$stmt->execute();
while ($row = $stmt->fetch()) {



echo "รหัสสินค้า:" .$row ["id_product"]."<br>";
echo "ชื่อสินค้า:" .$row ["name_product"]."<br>";
echo "ราคาสินค้า:" .$row ["price_product"]. "<br>";
echo "จำนวน:" .$row ["num_product"]. "<br>";
echo "ประเภทสินค้า:" .$row ["id_type"]. "<br>";

// echo "<a href='addproduct.php?id_product=".$row ["id_product"]."'>เพิ่มสินค้า</a> |";
echo "<a href='editformproduct.php?id_product=".$row ["id_product"]."'>แก้ไข</a> |";
echo "<a href='#' onclick= confirmDelete('".$row["id_product"]."')> ลบ</a>";
echo "<hr>\n";
 } ?>
</div>
</body>
</html>