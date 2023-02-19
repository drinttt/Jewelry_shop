<?php include "connect2.php"?>
<html>
<head><meta charset="utf-8">
    <script>
        function confirmDelete(id_product){
            var ans=confirm("ต้องการลบสมาชิก"+ id_product);
            if (ans==true)
            document.location ="deleteproduct.php?id_product="+id_product;
        }
    </script>

</head>
<body>
<?php
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
while ($row = $stmt->fetch()) {



echo "รหัสสินค้า:" .$row ["id_product"]."<br>";
echo "ชื่อสินค้า:" .$row ["name_product"]."<br>";
echo "ราคาสินค้า:" .$row ["price_product"]. "<br>";
echo "จำนวน:" .$row ["num_product"]. "<br>";
echo "ประเภทสินค้า:" .$row ["id_type"]. "<br>";

// echo "<a href='addproduct.php?id_product=".$row ["id_product"]."'>เพิ่มสินค้า</a> |";
echo "<a href='insertring.php?id_product=".$row ["id_product"]."'>add</a> |";
echo "<a href='#' onclick= confirmDelete('".$row["id_product"]."')> ลบ</a>";
echo "<hr>\n";
 } ?>

</body>
</html>