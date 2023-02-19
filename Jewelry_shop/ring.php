<?php 
session_start();
// if (!isset($_SESSION['username'])) {
// 	header("location:login.php");
// }
include "connect2.php"

?>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/ea69c221e1.js" crossorigin="anonymous"></script>
        <link href="style/st_home.css" rel="stylesheet">

        <script>
            function send(){
                request = new XMLHttpRequest();
                request.onreadystatechange = ShowResult;

                var keyword = document.getElementById("keyword").value;
                var url = "searchajaxring.php?keyword="+keyword;
                request.open("GET", url, true);
                request.send(null);
            }
            function ShowResult(){
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
            <!-- <div>
                <a class="cart" href="realcart.php?action="></a>
            </div> -->
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
                    <input class='input_s' placeholder='ค้นหา' type="text" id="keyword" onkeyup="send()">
                    <input class='butt' id='butt' type='button' value='ค้นหา'>
                </form>
            </div>
        </header>

        <nav>
            <ul class="navbar">
                <li><a class="navlink" href="homepage.php">HOME</a></li>|
                <li><a class="navlink" href="necklace.php">NECKLACE</a></li>|
                <li><a class="navlinkhome" href="ring.php">RING</a></li>|
                <li><a class="navlink" href="earing.php">EARRING</a></li>|
                <li><a class="navlink" href="bracelet.php">BRACELET</a></li>
            </ul>
        </nav>

        <main>
        <!-- search -->
        <div id="result"></div>

        </div><br><br>
        <!-- show all product -->
        <div class="productall">
            <?php
                $stmt=$pdo->prepare("SELECT * FROM `product` WHERE id_type='T002'");
                $stmt->execute();

                while($row=$stmt->fetch()){
            ?>
                
                <div class="product">
                        <a href="homepage.php?id_product=<?= $row["id_product"]?>">
                            <img src='img_decorate/product1/<?= $row["id_product"]?>.jpg' width='220'>
                        </a>
                        <p class="product"><?= $row["price_product"]?> Baht</p>
                        <p class="product"><?= $row["name_product"]?></p>
                        <form method="post" action="realcart.php?action=add&id_product=<?=$row["id_product"]?>&name_product=<?=$row["name_product"]?>&price_product=<?=$row["price_product"]?>">
                            <input type="number" name="num_product" value="1" min="1" max="9">
                            <input type="submit" value="BUY" style="background-color : black; color: white;">	   
			            </form><br>
                        <!-- <a href="realcart.php" style="text-decoration: none;"><p class="buy">BUY</p></a> -->
                    </div>
            <?php
                }
            ?>
        </div><br><br>
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
                        let result2 = document.getElementById('result2') // ดึง <ul> เพื่อใช้ในการเพิ่มแท็ก <li>

                        for (let i = 0; i < objectData.shop.length; i++) {
                            let content = 'สาขา: ' + objectData.shop[i].branch + '&nbsp'
                            content += 'ที่อยู่: ' + objectData.shop[i].address + '&nbsp'
                            content += 'เบอร์โทรติดต่อ: ' + objectData.shop[i].contact;
                            let li = document.createElement('li') ;
                            li.innerHTML = content ;
                            result2.appendChild(li) 
                        }
                    }
                    getDataFromAPI() // เรียกฟังก์ชัน    
                </script><br>
            </div> 
        </footer>
    </body>
</html>