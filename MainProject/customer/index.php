<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
            height: 60px;
            box-shadow: 0px 0px 10px 0px black;
        }

        .headhome {
            margin-left: 30px;
        }

        .firstcon {
            background-image: url(images/backfirstcon.jpg);
            height: 400px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            text-align: center;
        }

        .eleinfirst {
            align-items: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .eleinfirst h1 {
            font-size: 48px;
text-wrap: nowrap;
        }

        .eleinfirst p {
            font-size: 24px;
        }

        .secondcon {
            background-color: bisque;
            height: 400px;
            display: flex;
            flex-direction: row;
        }

        .leftsecon {
            padding: 30px;
            width: 50%;
            text-align: center;
        }

        .rightsecon {
            padding: 30px;
            width: 50%;
            background-image: url(images/imgsecondcon.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .thirdcon {
            background-color: rgb(249, 211, 163);
            height: 400px;
            display: flex;
            flex-direction: row;
        }

        .leftthird {
            padding: 30px;
            width: 50%;
            background-image: url(images/imgthird.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .rightthird {
            padding: 30px;
            width: 50%;
            text-align: center;
        }

        .fourthcon {
            background-color: bisque;
            height: 400px;
            display: flex;
            flex-direction: row;
        }

        .leftfourth {
            padding: 30px;
            width: 50%;
            text-align: center;
        }

        .rightfourth {
            padding: 30px;
            width: 50%;
            background-image: url(images/imgfourth.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        
        .headincon {
            font-size: 36px;
        }

        .para {
            text-align: left;
            font-size: 18px;
        }
        
        .lastcon {
            background-image: url(images/backlastcon.jpg);
            height: 400px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            opacity: 0.9;
        }
        
        .eleinlast {
            align-items: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .btnonlast {
            border-radius: 5px;
            background-color: green;
            height: 80px;
            width: auto;
            padding: 10px;
            color: white;
            font-size: 32px;
            border: none;
            text-align: center;
        }
        
        footer {
            position: sticky;
            bottom: 0;
            z-index: 1;
            background-color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-end;
            height: 60px;
            box-shadow: 0px 0px 10px 0px black;
        }
        
        .foothome {
            margin-right: 20px;
        }

        .btnonfoot {
            border-radius: 5px;
            background-color: green;
            height: 35px;
            width: auto;
            padding: 5px;
            color: white;
            font-size: 18px;
            border: none;
            text-align: center;
        }

        .button:hover {
            background-color: blue;
        }

        .button {
            transition-duration: 0.4s;
        }
    </style>

</head>

<body>
    <header>
        <h1 class="headhome"><img src="images/logo.png" style="height: 70px; width:auto;"></h1>
        <h1 class="headhome">ครัวเรือนไทย</h1>
    </header>

    <div class="firstcon">
        <div class="eleinfirst">
            <h1>ขอยินดีต้อนรับสู่ร้านอาหารครัวเรือนไทย</h1><br>
            <p>อิ่มอร่อยไปกับอาหารและเครื่องดื่มที่เราได้คัดสรรมาเพื่อคุณ</p>
        </div>
    </div>

    <div class="secondcon">
        <div class="leftsecon">
            <h1 class="headincon">เกี่ยวกับเรา</h1><br>
            <div class="para">
                <p>เราเป็นร้านอาหารไทยที่จะนำพาทุกท่านไปอิ่มอร่อยกับมื้ออาหารสุดวิเศษ
                    ด้วยเมนูอาหารที่หลากหลายมากมายและรสชาติที่กลมกล่อม อร่อยถูกใจท่านอย่างแน่นอน</p><br>
                <p>ทุกเมนูที่เรานำเสนอได้ผ่านกระบวนการคิดและคัดสรรวัตถุดิบมาเป็นอย่างดี
                    เมนูที่เราจะนำมาเสิร์ฟให้ท่านจะเป็นเมนูที่มอบความสุขและความอิ่มเอมใจ</p><br>
                <p>ในส่วนสุดท้ายนี้หลังจากที่ท่านเพลิดเพลิดไปกับอาหารที่ทางเราได้จัดเสิร์ฟให้ท่านแล้ว
                    เราก็หวังเป็นอย่างยิ่งที่จะได้เป็นผู้รับผิดชอบมื้ออาหารของท่านอีกในครั้งต่อๆไป</p>
            </div>
        </div>
        <div class="rightsecon"></div>
    </div>

    <div class="thirdcon">
        <div class="leftthird"></div>
        <div class="rightthird">
            <h1 class="headincon">ทำด้วยใจรัก</h1><br>
            <div class="para">
                <p>ทุกเมนูที่ถูกรังสรรค์ได้ผ่านกระบวนการที่ละเอียดและพิถีพิถันตั้งแต่วิธีการคัดเลือกวัตถุดิบ
                    การขนส่งและการเก็บรักษาเพื่อมั่นใจได้ว่าอาหารจากทางเรามีคุณภาพและความสดใหม่อยู่เสมอ</p><br>
                <p>ปรุงโดยเชฟมืออาชีพที่มีประสบการณ์และความชำนาญในเทคนิคการปรุงวัตถุดิบต่างๆ เชฟมีความละเอียด
                    แม่นยำและประณีตดังนั้นวางใจได้ว่าทุกจานของเรามีคุณภาพที่เต็มเปี่ยม</p>
            </div>
        </div>
    </div>

    <div class="fourthcon">
        <div class="leftfourth">
            <h1 class="headincon">ให้เราดูแลมื้ออาหารให้คุณ</h1><br>
            <div class="para">
                <p>เราพร้อมที่จะบริการ ดูแล เสิร์ฟอาหารร้อนๆ
                    เครื่องดื่มเย็นๆและของหวานอร่อยๆเพื่อให้คุณได้เพลิดเพลินไปกับมื้ออาหารและความสุขที่ได้รับประทานอาหารร่วมกัน
                    เราหวังเป็นอย่างยิ่งที่จะได้ดูแลและคอยบริการคุณตลอดจนจบมื้ออาหาร
                    เพราะความสุขของลูกค้าคือความสุขของเราเช่นกัน
                </p><br>
                <p>หลังจากนี้เราหวังอย่างยิ่งว่าท่านจะได้ประสบการณ์ที่ดีที่สุดสำหรับมื้ออาหารของท่านทั้งในครั้งนี้และครั้งต่อๆไป
                    ทางเราขอขอบพระคุณเป็นอย่างที่ท่านไว้วางใจในร้านอาหารของเราหลังจากนี้ขอให้ท่านได้พบกับอาหาร
                    เครื่องดื่มและของหวานที่รอให้สั่งอาหารเข้ามา ทางเราจะเตรียมมอบความสุขให้ท่านโดยเร็วที่สุดขอบคุณ</p>
                <br>
            </div>
        </div>
        <div class="rightfourth"></div>
    </div>

    <div class="lastcon">
        <div class="eleinlast">
            <button class="button btnonlast" onclick="<?php 
                if (isset($_SESSION["table"])){
                    echo "window.location.href = 'menu.php';";
                }else{
                    echo "popup('table')";
                }

            ?>">เริ่มต้นการสั่งอาหาร</button>
        </div>
    </div>

    <footer>
        <p class="foothome">หากท่านติดปัญหาการใช้งานสามารถกดปุ่มนี้เพื่อเรียกพนักงานได้</p>
        <button class="button btnonfoot foothome" onclick="popup('call')">ติดต่อพนักงาน</button>
    </footer>

<div id="popupCall" class="popup-container">
    <div class="popup-content" style="text-align: center;">
        <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
        <img src="images/customer-service.png" width="150px" height="150px">
        <h2>ติดต่อพนักงาน</h2>
        <form id="myForm">
            <div>
                <select id="promselect" name="problem" class="form-select hidden" style="margin-top:10px; border:black solid 2px; width:350px" onchange="toggleTextInput()">
                    <option value="other" selected>อื่นๆ(โปรดระบุ)</option>
                </select>
                <label style="color:red; display:none;" id="selectwarning1">โปรดเลือกเรื่องที่ต้องการติดต่อ</label>
            </div>
            <div class="other-input" id="otherInput" style="margin-top:10px; display:flex;">
                <label style="width: 50%;" for="otherInput">ระบุเรื่องที่ต้องการติดต่อ:</label>
                <input style="width: 50%;" type="text" name="other" id="othertext">
            </div>
            <label style="color:red; display:none;" id="selectwarning2">โปรดเลือกเรื่องที่ต้องการติดต่อ</label>
            <div style="margin-top:10px; display:flex;">
                <label style="width: 50%;" for="tablenum">ระบุเลขโต๊ะ:</label>
                <input style="width: 50%;" type="number" name="tablenum" id="tablenum">
            </div>
            <label style="color:red; display:none;" id="selectwarning3">โปรดระบุเลขโต๊ะให้ถูกต้อง</label>
            <div style="margin-top: 10px;">
            <textarea id = "mass" name="massage" type="text" placeholder="ระบุข้อความเพื่มเติม" id="massage" style="border:black solid 1px; width:350px; height:70px"></textarea>
            </div>

            <button type="button" class="btn btn-success" style="margin-top:10px" onclick="callemp('call')">ยืนยัน</button>
            <button type="button" class="btn btn-danger" style="margin-top:10px" onclick="popclose()">ยกเลิก</button>
        </form>
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

<div id="popuptable" class="popup-container">
    <div class="popup-content" style="text-align: center;">
        <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
        <img src="images/table_333521.png" width="150px" height="150px">
        <h2>ระบุหมายเลขโต๊ะ</h2>
        <form method="get" action='menu.php'>
            <div style="margin-top:10px; display:flex;">
                <label style="width: 50%;" for="tablenum">ระบุเลขโต๊ะ:</label>
                <select id="table" name="table" class="form-select" style="width:200px" onchange="toggleTextInput()">
                <?php
                    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
                    $username = "admin"; //ตามที่กำหนดให้
                    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
                    $dbname = "ProjectDB";    //ตามที่กำหนดให้
                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                
                    $sql = "SELECT table_id FROM cus_table where stutus=0";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=".$row['table_id'].">".$row['table_id']."</option>";
                        }
                    }
                    mysqli_close($conn);
                ?></select>
            </div>
            <button type="submit" class="btn btn-success" style="margin-top:10px">ยืนยัน</button>
            <button type="button" class="btn btn-danger" style="margin-top:10px" onclick="popclose()">ยกเลิก</button>
        </form>
    </div>
</div>



<script>
    function callemp(act){
        var selectElement = document.getElementById("promselect");
        var othertext = document.getElementById("othertext");
        var numtext = document.getElementById("tablenum")
        var warn1 = document.getElementById("selectwarning1");
        var warn2 = document.getElementById("selectwarning2");
        var warn3 = document.getElementById("selectwarning3");
        var choice = document.getElementById("choice");

        console.log(numtext.value);

        if ((selectElement.value === "" && act == "call") || (selectElement.value === "other" && othertext.value === "" && act == "call") || ((parseInt(numtext.value) <= 0 || numtext.value === "") && act == "call")){
            if (selectElement.value === "" && act == "call"){
                warn1.style.display = 'block';
            }else{
                warn1.style.display = 'none';
            }
            if (selectElement.value === "other" && othertext.value === "" && act == "call"){
                warn2.style.display = 'block';
            }else{
                warn2.style.display = 'none';
            }
            if ((parseInt(numtext.value) <= 0 || numtext.value === "") && act == "call"){
                warn3.style.display = 'block';
            }else{
                warn3.style.display = 'none';
            }
            return;
        }

        var formData = new FormData(document.getElementById("myForm"));

        // Send data via AJAX
        fetch('callemp.php', {
            method: 'POST',
            body: formData
        }).then(response => {
            console.log("pass")
        }).catch(error => {
            console.error('Error:', error);
        });

        document.getElementById('popupCall').style.display = 'none';
        document.getElementById('popupSuscess').style.display = 'block';
        document.getElementById('popuptable').style.display = 'none';
        selectElement.value = "other";
        document.getElementById('othertext').value = '';
        document.getElementById('mass').value = '';
    }
    function popup(act){
        if (act == "call"){
            document.getElementById('popupCall').style.display = 'block';
        }else if(act == "table"){
            document.getElementById('popuptable').style.display = 'block';
        }
        
    }
    function popclose(){
        document.getElementById('popupCall').style.display = 'none';
        document.getElementById('popupSuscess').style.display = 'none';
        document.getElementById('popuptable').style.display = 'none';
        document.getElementById("selectwarning1").style.display = 'none';
        document.getElementById("selectwarning2").style.display = 'none';
        document.getElementById("selectwarning3").style.display = 'none';
    }
</script>
</body>

</html>