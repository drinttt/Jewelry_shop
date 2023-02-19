<?php include "connect2.php"?>
<html>
<head>
    <meta charset="utf-8">
    <link href="style/style_ad.css" rel="stylesheet"> 
</head>
<body >
<header>
  
<img src="img_decorate/jewshop5.png" width="200" height="40" >
</header>
<nav>
    <a href="homead.php">BACK</a>
    </nav>
<div class="list">
<?php
$stmt = $pdo->prepare("SELECT customer.username_cus,customer.password_cus,customer.name_cus,customer.surname_cus,customer.address_cus,email_customer.email_cus FROM customer JOIN email_customer
ON customer.username_cus=email_customer.username_cus;
");
$stmt->execute();
?>

<?php

while ($row = $stmt->fetch()) {
?>

ชื่อยูสเซอร์:<?=$row ["username_cus"]?><br>
รหัสผ่าน:<?=$row ["password_cus"]?><br>
ชื่อสมาชิก:<?=$row ["name_cus"]?><br>
นามสกุลสมาชิก:<?=$row ["surname_cus"]?><br>
ที่อยู่:<?=$row ["address_cus"]?><br>
อีเมล:<?=$row ["email_cus"]?><br><hr>

<?php } ?>

</div>
</body>
</html>