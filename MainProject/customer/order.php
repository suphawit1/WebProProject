<?php session_start();
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="styles.css">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <div id="popthank" class="popup-container">
        <div class="popup-content" style="text-align: center;">
            <span class="close-button" id="closePopupButton" onclick="window.location.href = 'index.php'";>&times;</span>
            <img src="images/thank-you-png-icon-17618.png" width="150px" height="150px">
            <h2>ขอบคุณที่ใช้บริการ</h2>
            <button type="button" class="btn btn-success" style="margin-top:10px" onclick="window.location.href = 'index.php'">ยืนยัน</button>
        </div>
    </div>
    <script>
    function checkSession() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'checkSession.php', true);
        xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            num = parseInt(xhr.responseText);
            if (num == 1){
                document.getElementById('popthank').style.display = "block";
            }
        }
        };
        xhr.send();
    }

    setInterval(checkSession, 2000);
    </script>
    <style>
        body{
            background-color: grey;
        }
        .rows{
            max-width: 50%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
            background-color: white;
        }
        .detail{
            margin-left: auto;
            margin-right: auto;
            padding-left: 5%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 5rem;
        }
    </style>
</head>
    <header style="background-color: #622c0b;">
        <div class="container-fluid" id="header-container">
            <div class="container-fluid">
                <div class="row" style="text-align: center;">
                    <div class="col-md-1 header-element nohover" onclick="window.location.href = 'menu.php';"><img src="images/logo.png" style="height: 70px; width:auto;"></div>
                    <div class="col-md-3 header-element nohover" style="justify-content:left;" onclick="window.location.href = 'menu.php';"><span class="font-header">ครัวเรือนไทย</span></div>
                    <div class="col-md-6"></div>
                    <div class="col-md-2 header-element nohover"><span class="font-header">โต๊ะ <?php echo $_SESSION["table"]?></span></div>
                </div>
            </div>
        </div>
    </header>
    <div id="popupPay" class="popup-container">
        <div class="popup-content" style="text-align: center;">
            <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
            <img src="images/payment-icon-5646.png" width="150px" height="150px">
            <h2>ยืนยันการเรียกเก็บเงิน</h2>
            <p>ราคารวม:<?php
                $table = $_SESSION["table"];
                $sql = "SELECT amount FROM cus_table WHERE table_id=$table;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['amount'];
            ?>
            บาท</p>
            <button type="button" class="btn btn-success" style="margin-right:10px" onclick="callemp('pay')">ยืนยัน</button>
            <button type="button" class="btn btn-danger" onclick="popclose()">ยกเลิก</button>
        </div>
    </div>

    <div id="popupSuscess" class="popup-container">
        <div class="popup-content" style="text-align: center;">
            <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
            <img src="images/check_icon.png" width="150px" height="150px">
            <h2>แจ้งพนักงานเรียบร้อย</h2>
            <button type="button" class="btn btn-success" onclick="popclose()">ยืนยัน</button>
        </div>
    </div>

    <div id="popupCall" class="popup-container">
        <div class="popup-content" style="text-align: center;">
            <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
            <img src="images/customer-service.png" width="150px" height="150px">
            <h2>ติดต่อพนักงาน</h2>
            <form id="myForm">
                <div>
                    <select id="promselect" name="problem" class="form-select" style="margin-top:10px; border:black solid 2px; width:350px" onchange="toggleTextInput()">
                        <option value="" selected>โปรดเลือกเรื่องที่ต้องการติดต่อ</option>
                        <option value="อาหารส่งช้า">อาหารส่งช้า</option>
                        <option value="ภาชนะไม่เพียงพอ">ภาชนะไม่เพียงพอ</option>
                        <option value="มีปัญหาการสั่งอาหาร">มีปัญหาการสั่งอาหาร</option>
                        <option value="other">อื่นๆ(โปรดระบุ)</option>
                    </select>
                    <label style="color:red; display:none;" id="selectwarning1">โปรดเลือกเรื่องที่ต้องการติดต่อ</label>
                </div>
                <div class="other-input" id="otherInput" style="display: none; margin-top:10px">
                    <label for="otherInput">ระบุเรื่องที่ต้องการติดต่อ</label>
                    <input type="text" name="other" id="othertext">
                    <label style="color:red; display:none;" id="selectwarning2">โปรดเลือกเรื่องที่ต้องการติดต่อ</label>
                </div>
                <div style="margin-top: 10px;">
                <textarea id = "mass" name="massage" type="text" placeholder="ระบุข้อความเพื่มเติม" id="massage" style="border:black solid 1px; width:350px; height:70px"></textarea>
                </div>
                <input type="hidden" name="tablenum" value="<?php echo $_SESSION["table"]?>">

                <button type="button" class="btn btn-success" style="margin-top:10px" onclick="callemp('call')">ยืนยัน</button>
            </form>
        </div>
    </div>
<body>
    <div>
        <div class="rows">
        <h1 style="text-align: Center;">รายการอาหารทั้งหมดของคุณ</h1>
        <?php
            $table = $_SESSION["table"];
            $sql ="SELECT DISTINCT menu FROM menu_order where table_no = $table";
            $result = mysqli_query($conn, $sql);
            $numrow = mysqli_num_rows($result);
            if ($numrow > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    $menu = $row['menu'];
                    echo "<div class='detail'>";
                    echo "<h4>" . $menu . "</h4>";
                    $amount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(menu) FROM menu_order WHERE menu='$menu' AND table_no=$table;"));
                    echo "<h4>x" . $amount["COUNT(menu)"] . "</h4>";
                    $price = mysqli_fetch_assoc(mysqli_query($conn, "SELECT price FROM menu WHERE name='$menu';"));
                    echo "<h4>" . $price["price"]*$amount["COUNT(menu)"] . " บาท</h4>";
                    echo "</div>";
                }
            }else{
                echo "<h1>ยังไม่มีรายการอาหารที่ถูกสั่ง</h1></div>";
            }

            mysqli_close($conn);
            echo "</div></div>";
        ?>
    </div>
    <footer>
        <div class="container">
            <div class="row" style="text-align: center;">
                <div class="col-md-6"><button type="button" class="btn btn-warning" onclick="popup('pay')">เรียกเก็บเงิน</button></div>
                <div class="col-md-6 "><button type="button" class="btn btn-warning" onclick="popup('call')">ติดต่อพนักงาน</button></div>
            </div>
        </div>
    </footer>
<script src="popupfoot.js"></script>
</body>
</html>