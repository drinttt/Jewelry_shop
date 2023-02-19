<html>
<head>
    <meta charset="utf-8">
    <link href="style/style_ad.css" rel="stylesheet"> 
</head>
<body>
<?php include "connect2.php" ?>
    <header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
    <nav>
    <a href="orderlist.php">BACK</a>
    </nav>
    <section class='list'>
<?php
        // date_order	
// time_order	
// qty_product	
// username_cus	
// id_product	
// payment_status

// UPDATE `po` SET `payment_status` = 'TT' WHERE `po`.`date_order` = '2022-10-10' AND `po`.`time_order` = '15:55:55' AND `po`.`qty_product` = 1 AND `po`.`username_cus` = 'jenniekim' AND `po`.`id_product` = 1;

    $stmt = $pdo->prepare("UPDATE po SET payment_status=? WHERE date_order=? AND time_order=?AND qty_product=?  AND username_cus=? AND id_product=?");
     
    $stmt->bindParam(1, $_POST["payment_status"]); 
    $stmt->bindParam(2, $_POST["date_order"]); 
    $stmt->bindParam(3, $_POST["time_order"]); 
    $stmt->bindParam(4, $_POST["qty_product"]); 
    $stmt->bindParam(5, $_POST["username_cus"]); 
    $stmt->bindParam(6, $_POST["id_product"]); 
    if ($stmt->execute()){
        echo "<script>alert('แก้ไขสถานะการจ่ายเงินสำเร็จ');window.location.href = 'orderlist.php';</script>";
    }
    ?>
    </section>
</body>
</html>