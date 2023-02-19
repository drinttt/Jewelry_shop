<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
include "connect2.php";

?>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/ea69c221e1.js" crossorigin="anonymous"></script>
        <link href="style/st_home.css" rel="stylesheet">

        <script>
            function send(){
                request = new XMLHttpRequest();
                request.onreadystatechange = showResult;

                var keyword = document.getElementById("keyword").value;
                var url = "searchajax.php?keyword="+keyword;
                request.open("GET", url, true);
                request.send(null);
            }
            function showResult(){
                if(request.readyState==4){
                    if(request.status==200){
                        document.getElementById("result").innerHTML=request.responseText;
                    }
                }
            }
        </script>
    </head>
    <body>
    <header class='header'>
            <div id="jewshop">
                <img src="img_decorate/jewshop5.png" width="200" height="40">
            </div>
            <!-- cart -->
            <a class="cart" href="realcart.php?action="></a>
            <!-- dropdown profile -->
            <div class="dropdown">
                <a class="dropbtn"></a>
                <div class="dropdown-content">
                    <a href="profile.php">PROFILE</a>
                    <a href="logout.php">LOGOUT</a>
                </div>
            </div>
            <!-- input_search -->
            <div id="search">
                <form>
                    <!-- <input type="search" name="keyword"> -->
                    <input type="text" id="keyword" onkeyup="send()">
                    <input class='butt' type='button' value='ค้นหา'>
                </form>
            </div>
        </header>

        <nav>
            <ul class="navbar">
                <li><a class="navlinkhome" href="homepage.php">HOME</a></li>|
                <li><a class="navlink" href="necklace.php">NECKLACE</a></li>|
                <li><a class="navlink" href="ring.php">RING</a></li>|
                <li><a class="navlink" href="earing.php">EARRING</a></li>|
                <li><a class="navlink" href="bracelet.php">BRACELET</a></li>
                <!-- |<li><a class="navlink" href="cart.php">CART</a></li> -->
            </ul>
        </nav>

        <main>
            <?php
                $stmt=$pdo->prepare("SELECT * FROM customer JOIN email_customer ON customer.username_cus=email_customer.username_cus 
                    JOIN tel_customer ON customer.username_cus=tel_customer.username_cus 
                    WHERE customer.username_cus = ? ");
                    $stmt->bindParam(1,$_SESSION["username"]);
                    $stmt->execute();
                    $row=$stmt->fetch();
            ?>
            <div class="show_profile">
                <form action="editprofile.php" method="POST"><br><br>
                    <b>✤ EDIT PROFILE ✤</b><br><br>
                    <em>Username: <input type="text" name="username" pattern=".{4,}" title="username 4 ตัวอักษรขึ้นไป" require
                                value="<?=$row['username_cus']?>" ><br>
                    Password: <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{4,}$"
                            title="ตัวพิมพ์ใหญ่/ตัวพิมพ์เล็ก/ตัวเลข ต้องมีอย่างน้อย 1 ตัวและรหัสผ่าน4ตัวขึ้นไป" require
                            value="<?=$row['password_cus']?>"><br>
                    Name: <input type="text" name="name" pattern="[ก-๏]+" require
                            value="<?=$row['name_cus']?>"><br>
                    Surname: <input type="text" name="surname" pattern="[ก-๏]+" require
                            value="<?=$row['surname_cus']?>"><br>
                    Address: <input type="text" name="address" require 
                            value="<?=$row['address_cus']?>"><br>
                    Email: <input type="email" name="email" require
                        value="<?=$row['email_cus']?>"><br>
                    Tel: <input type="tel" name="tel" require
                        value="<?=$row['tel_cus']?>"></em><br><br>
                    <input class="butt" type="submit" value="แก้ไข">
                    <br><br>
                </form>
            </div>
        </main>
        <footer>
        <div class="jsonn"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a>สาขาในกรุงเทพมหานครและปริมณฑล</a>
                <ul id="result2"></ul>
            
                <script>
                    function showResult(){
                        if(request.readyState==4){
                            if(request.status==200){
                                document.getElementById("result2").innerHTML=request.responseText;
                            }
                        }
                    } 
                    async function getDataFromAPI() {
                        let response = await fetch('branch.json')
                        let rawData = await response.text() // อ่านผลลัพธ์
                        objectData = JSON.parse(rawData) // แปลผลลัพธ์เป็น object
                        let result = document.getElementById('result2') // ดึง <ul> เพื่อใช้ในการเพิ่มแท็ก <li>

                        for (let i = 0; i < objectData.shop.length; i++) {
                            let content = 'สาขา: ' + objectData.shop[i].branch + '&nbsp'
                            content += 'ที่อยู่: ' + objectData.shop[i].address + '&nbsp'
                            content += 'เบอร์โทรติดต่อ: ' + objectData.shop[i].contact;
                            let li = document.createElement('li') ;
                            li.innerHTML = content ;
                            result.appendChild(li) 
                        }
                    }
                    getDataFromAPI() // เรียกฟังก์ชัน    
                </script><br><br>
            </div> 
        </footer>
    </body>
</html>