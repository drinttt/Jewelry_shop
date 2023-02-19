<!-- <?php 
session_start();
session_destroy();

header("Location: login.php");?> -->

<?php session_start();
// ลบ session id ในคุกกี้เครื่องของผู้ใช้
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000,
$params["path"], $params["domain"],
$params["secure"], $params["httponly"]
);
session_destroy(); // ทําลาย session
?>
ออกจากระบบสำเร็จแล้ว<br>
หากต้องการเข้าสู่ระบบอีกครั้งโปรดคลิ๊ก
<a href='login.php'>เข้าสู่ระบบ</a>