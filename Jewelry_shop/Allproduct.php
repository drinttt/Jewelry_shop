<?php include "connect2.php"?>
<html>
<head>
    <meta charset="utf-8">
    <link href="style/style_ad2.css" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/ea69c221e1.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <img src="img_decorate/jewshop5.png" width="200" height="40" >
    </header>
    <nav>
        <ul class="navbar">
            <li><a href="homead.php">BACK</a></li>
            <li><a href="T001.php">Necklace</a></li>
            <li><a href="T002.php">Ring</a></li>
            <li><a href="T003.php">Earring</a></li>
            <li><a href="T004.php">Bracelet</a></li>
        </ul>
    </nav>
    
    <section class="list">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();
            
            while ($row = $stmt->fetch()) {
                echo "รหัสสินค้า:" .$row ["id_product"]."<br>";
                echo "ชื่อสินค้า:" .$row ["name_product"]."<br>";
                echo "ราคาสินค้า:" .$row ["price_product"]. "<br>";
                echo "จำนวน:" .$row ["num_product"]. "<br>";
                echo "ประเภทสินค้า:" .$row ["id_type"]. "<br><hr>";

        } ?>
    </section>

    <footer>
        <a href="homead.php">BACK</a>
        <a href="T001.php">Necklace</a>
        <a href="T002.php">Ring</a>
        <a href="T003.php">Earring</a>
        <a href="T004.php">Bracelet</a>
    </footer>
    <br><br><br><br><br><br>
</body>
</html>