<?php include "connect2.php"?>
<html>
<head>
    <meta charset="utf-8">
    <style>
             .list{
        padding: 100px;
        background-color:white;
        margin:100px 100px;
        border-radius:50px;

    }
    body{
        background-color:black;
    }
    header{
            background-color:black;
            display: flex;
            justify-content:center;
            height: 85px;
            align-items: center;
            
        }
    nav{
        text-align:center;
    }
    nav a{
        display: inline-flex;
        text-align:center;
        font-size:30px;
        border-radius:10px;
        margin:20px;
        padding:30px;
        /* padding:20px;
        margin-left:650px;
        margin-right:650px; */
        background:white;
        color:black;
    }
    a:link{
        text-decoration:none;
    }
    a:hover{
        background:yellow;
    }
    </style>
</head>
<body >
<header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
    <nav>
    <a href="homead.php">BACK</a>
    </nav>
<div class="list">
<?php
$stmt = $pdo->prepare("SELECT po.date_order,SUM(po.qty_product*product.price_product)AS income
FROM customer JOIN po ON customer.username_cus=po.username_cus
JOIN product ON po.id_product = product.id_product GROUP BY po.date_order;");
$stmt->execute();
?>


<?php

while ($row = $stmt->fetch()) {
?>

<tr>
วันที่มีการขายสินค้าได้:<?=$row ["date_order"]?><br>
รายได้รวม:<?=$row ["income"]?><br><hr>

</tr>
<?php } ?>


</body>
</html>