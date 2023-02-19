<?php include "connect2.php" ?>
<?php


$stmt = $pdo->prepare("DELETE FROM product WHERE id_product=?");
$stmt->bindParam(1, $_GET["id_product"]); 
if ($stmt->execute()) 
header("location: listproduct.php"); 

?>