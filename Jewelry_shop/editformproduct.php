<?php include "connect2.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM product WHERE id_product = ?");
    $stmt->bindParam(1, $_GET["id_product"]); 
    $stmt->execute(); 
    $row = $stmt->fetch(); 
    ?>
<html>
<head>
    <meta charset="utf-8">
    <link href="style/style_ad.css" rel="stylesheet"> 
</head>
<body>
    <header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
    <nav>
    <a href="listproduct.php">BACK</a>
    </nav>
    <section class='list'>
    <form action="editproduct.php" method="POST">
    <input type="hidden" name="id_product" value="<?=$row["id_product"]?>"><br>
    

    ชื่อ<input type="text" name="name_product" value="<?=$row["name_product"]?>"><br>
    ราคาสินค้า<input type="text" name="price_product" value="<?=$row["price_product"]?>"><br>
    จำนวน<input type="text" name="num_product" value="<?=$row["num_product"]?>"><br>
    <label>id_type:
    <select name="id_type">
    <option value="T001" >Necklace</option>
    <option value="T002" >Ring</option>
    <option value="T003">Earring</option>
    <option value="T004">bracelet</option><br>
    <input type="submit" value="แก้ไขข้อมูล">


</form>
</section>
</body>
</html>
