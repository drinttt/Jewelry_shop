<?php include "connect2.php" ?>
<?php
    // date_order	
// time_order	
// qty_product	
// username_cus	
// id_product	
// payment_status
    $stmt = $pdo->prepare("SELECT * FROM po WHERE date_order=? AND time_order=? AND qty_product=? AND username_cus=? AND id_product=? AND payment_status=?;");
    $stmt->bindParam(1, $_GET["date_order"]); 
    $stmt->bindParam(2, $_GET["time_order"]); 
    $stmt->bindParam(3, $_GET["qty_product"]); 
    $stmt->bindParam(4, $_GET["username_cus"]); 
    $stmt->bindParam(5, $_GET["id_product"]); 
    $stmt->bindParam(6, $_GET["payment_status"]); 
   
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
    <a href="orderlist.php">BACK</a>
    </nav>
    <section class='list'>

    <form action="submitedit_orderlist.php" method="POST">
    


    Date Order    :<input type="text" name="date_order" value="<?=$row["date_order"]?>"><br>
    Time Order    :<input type="text" name="time_order" value="<?=$row["time_order"]?>"><br>
    Quantity      :<input type="text" name="qty_product" value="<?=$row["qty_product"]?>"><br>
    Username      :<input type="text" name="username_cus" value="<?=$row["username_cus"]?>"><br>
    Id product    : <input type="text" name="id_product" value="<?=$row["id_product"]?>"><br>
    Payment status: <input type="text" name="payment_status" value="<?=$row["payment_status"]?>"><br>
    
    <input type="submit" value="แก้ไขข้อมูล">


</form>
</section>
</body>
</html>
