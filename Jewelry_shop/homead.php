<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
include "connect2.php"

?>

<html>
<head>
    <link href="style/st_homead.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ea69c221e1.js" crossorigin="anonymous"></script>
</head>
	<body>
		<header><img src="img_decorate/jewshop5.png" width="200" height="40" >
        </header>

			<section>
                <nav>
                    <ul class="navbar" style=list-style-type:square;><br>
                    <li><a href="detailcustomer.php">ข้อมูลสมาชิก</a></li><br>
                    <li><a href="allproduct.php">ข้อมูลสินค้าทั้งหมด</a></li><br>
                    <li><a href="listproduct.php">แก้ไขสินค้า</a></li><br>
                    <li><a href="addproduct.php">เพิ่มสินค้า</a></li><br>
                    <li><a href="orderlist.php">คำสั่งซื้อ</a></li><br>
                    <li><a href="allorderlist.php">ออเดอร์ทั้งหมดที่ขายได้</a></li><br>
                    <li><a href="incomeperday.php">ยอดขายทั้งหมดในแต่ละวัน</a></li><br>
                    <li><a href="logout.php">Logout</a></li><br>
                        <!-- <a href="status.php">สถานะการชำระเงิน</a><br> -->
                    </ul>
                </nav>
                <div id="hello"><h1>สวัสดี<?=$_SESSION["username"]?></div>
                <div class="centerad">
                <div class="allpd" >
                    <?php
                        $stmt=$pdo->prepare("SELECT * FROM product");
                        $stmt->execute();

                        while($row=$stmt->fetch()){
                    ?>
                        
                            <div class="product">
                                <br><br>
                                <a href="detail.php?id_product=<?= $row["id_product"]?>">
                                    <img src='img_decorate/product1/<?= $row["id_product"]?>.jpg' width='200'>
                                    
                                </a><br>
                                <div>
                                รหัสสินค้า:<?=$row["id_product"]?><br>
                                ชื่อสินค้า:<?=$row ["name_product"]?><br>
                                ราคาสินค้า:<?=$row ["price_product"]?><br>
                                จำนวน:<?=$row ["num_product"]?><br>
                                ประเภทสินค้า:<?=$row ["id_type"]?><br>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                </div>
			</section>	
            <footer>
                <br><br><br><br><br><br><br>
            </footer>
	</body>
</html>