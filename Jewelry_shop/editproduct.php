<html>
<head>
    <meta charset="utf-8">
    <link href="style/style_ad.css" rel="stylesheet"> 
</head>
<body>
<?php include "connect2.php" ?>
    <header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
    <nav>
    <a href="listproduct.php">BACK</a>
    </nav>
    <section class='list'>
<?php
    
    $stmt = $pdo->prepare("UPDATE product SET name_product=?,price_product=?,num_product=?,id_type=? WHERE id_product=?");
    $stmt->bindParam(1, $_POST["name_product"]);
    $stmt->bindParam(2, $_POST["price_product"]);
    $stmt->bindParam(3, $_POST["num_product"]);
    $stmt->bindParam(4, $_POST["id_type"]);
    $stmt->bindParam(5, $_POST["id_product"]);
    if ($stmt->execute()){
    echo "แก้ไขสมาชิก" .$_POST["name_product"]."สำเร็จ";
    }
    ?>
    </section>
</body>
</html>