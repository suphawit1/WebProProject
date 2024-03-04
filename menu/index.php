<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
    @font-face {
        font-family: myWebFont;
        src: url(../font/K2D-Regular.ttf);
    }

    body {
        font-family: myWebFont;
        font-size: 20px;
    }

    header{
        position: sticky;
        top: 0;
        z-index: 1000;
        height: fit-content;
        border: 10px yellow solid;
    }
    footer{
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: gray;
        padding: 15px;
        text-align: center;
    }
    #header-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height:100%;
        }
    .header-element{
        cursor: pointer;
    }
    .header-element:hover{
        background-color: yellowgreen;
    }
    .font-header{
        font-size: 150%;
    }
    input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
    }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
    }
    .hidden{
        display: none;
    }
    .popup-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 20px;
        color: #888;
    }

    .close-button:hover {
        color: #333;
    }
</style>
<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "SELECT table_id FROM cus_table where stutus=1 AND ADDTIME(open_order_time,'02:30:00') < NOW()";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row['table_id'];
            $sql = "UPDATE cus_table SET stutus = 0, open_order_time = null WHERE table_id = '".$row['table_id']."';";
            $result = mysqli_query($conn, $sql);
        }
    }

    session_set_cookie_params(5400);
    session_start();

    if (!isset($_SESSION['table_number'])) {
        $sql = "SELECT table_id FROM cus_table WHERE stutus=0 limit 1;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['table_number'] = $row['table_id'];
            $sql = "UPDATE cus_table SET stutus = 1, open_order_time = NOW() WHERE table_id = '".$_SESSION['table_number']."';";
            $result = mysqli_query($conn, $sql);
        }else{
            echo "<h1>โต้ะเต็ม</h1>";
        }
    }
?>
<header style="background-color: Yellow;">
    <div class="container-fluid" id="header-container">
        <div class="container-fluid">
            <div class="row" style="text-align: center;">
                <div class="col-md-1 header-element" onclick="typeselect('')"><span class="font-header">logo</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('แกง')"><span class="font-header">แกง</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ผัด')"><span class="font-header">ผัด</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ทอด')"><span class="font-header">ทอด</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ปิ้งย่าง')"><span class="font-header">ปิ้ง/ย่าง</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ยำ')"><span class="font-header">ยำ</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ข้าว')"><span class="font-header">ข้าว</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('เครื่องดื่ม')"><span class="font-header">เครื่องดื่ม</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ของหวาน')"><span class="font-header">ของหวาน</span></div>
                <div class="col-md-2 header-element"><span class="font-header">รายการอาหารที่สั่ง</span></div>
                <div class="col-md-1"><span class="font-header">โต้ะ <?php echo $_SESSION["table_number"]?></span></div>
            </div>
        </div>
    </div>
</header>

<div id="popupPay" class="popup-container">
    <div class="popup-content" style="text-align: center;">
        <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
        <img src="img/payment-icon-5646.png" width="150px" height="150px">
        <h2>ยืนยันการเรียกเก็บเงิน</h2>
        <p>ราคารวม:<?php
            $table = $_SESSION['table_number'];
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
        <img src="img/check_icon.png" width="150px" height="150px">
        <h2>แจ้งพนักงานเรียบร้อย</h2>
        <button type="button" class="btn btn-success" onclick="popclose()">ยืนยัน</button>
    </div>
</div>

<div id="popupCall" class="popup-container">
    <div class="popup-content" style="text-align: center;">
        <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
        <img src="img/customer-service.png" width="150px" height="150px">
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

            <button type="button" class="btn btn-success" style="margin-top:10px" onclick="callemp('call')">ยืนยัน</button>
        </form>
    </div>
</div>


<body>
    <form action="testmenu.php" method="GET">
    <div class="container" id="soup" style="margin-top:10px">
        <div class="row"><h1>แกง</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='แกง';";
        $result = mysqli_query($conn, $sql);

        $numrow = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row' style='margin-top:10px;'><div class='col-md-3'><img src='" . $row["image"]. "' width='100%' height='100%'></div>";
            echo "<div class='col-md-3'><h2>". $row["name"]. "</h2></div>";
            echo "<div class='col-md-3'><h2>". $row["price"]. " บาท</h2></div>";
            echo "<div class='col-md-3'>
                <button style='width:30px;' onclick='minus(".$row["menuid"].")'>-</button>
                <input id='".$row["menuid"]."'style='width:30px; text-align: center;' type='number' name='menu[".$row['menuid']."]' value=0>
                <button style='width:30px;' onclick='plus(".$row["menuid"].")'>+</button></div></div>";
        }
        } else {
        echo "0 results";
        }
    ?>
    </div>

    <div class="container" id="fry" style="margin-top:10px">
        <div class="row"><h1>ผัด</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='ผัด';";
        $result = mysqli_query($conn, $sql);

        $numrow = $numrow+mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row' style='margin-top:10px;'><div class='col-md-3'><img src='" . $row["image"]. "' width='100%' height='100%'></div>";
            echo "<div class='col-md-3'><h2>". $row["name"]. "</h2></div>";
            echo "<div class='col-md-3'><h2>". $row["price"]. " บาท</h2></div>";
            echo "<div class='col-md-3'>
                <button style='width:30px;' onclick='minus(".$row["menuid"].")'>-</button>
                <input id='".$row["menuid"]."'style='width:30px; text-align: center;' type='number' name='menu[".$row['menuid']."]' value=0>
                <button style='width:30px;' onclick='plus(".$row["menuid"].")'>+</button></div></div>";
        }
        } else {
            echo "0 results";
        }
    ?>
    </div>

    <div class="container" id="deep-fry" style="margin-top:10px">
        <div class="row"><h1>ทอด</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='ทอด';";
        $result = mysqli_query($conn, $sql);

        $numrow = $numrow+mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row' style='margin-top:10px;'><div class='col-md-3'><img src='" . $row["image"]. "' width='100%' height='100%'></div>";
            echo "<div class='col-md-3'><h2>". $row["name"]. "</h2></div>";
            echo "<div class='col-md-3'><h2>". $row["price"]. " บาท</h2></div>";
            echo "<div class='col-md-3'>
                <button style='width:30px;' onclick='minus(".$row["menuid"].")'>-</button>
                <input id='".$row["menuid"]."'style='width:30px; text-align: center;' type='number' name='menu[".$row['menuid']."]' value=0>
                <button style='width:30px;' onclick='plus(".$row["menuid"].")'>+</button></div></div>";
            }
        } else {
        echo "0 results";
        }
    ?>
    </div>

    <div class="container" id="grill" style="margin-top:10px">
        <div class="row"><h1>ปิ้ง/ย่าง</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='ปิ้ง/ย่าง';";
        $result = mysqli_query($conn, $sql);

        $numrow = $numrow+mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row' style='margin-top:10px;'><div class='col-md-3'><img src='" . $row["image"]. "' width='100%' height='100%'></div>";
            echo "<div class='col-md-3'><h2>". $row["name"]. "</h2></div>";
            echo "<div class='col-md-3'><h2>". $row["price"]. " บาท</h2></div>";
            echo "<div class='col-md-3'>
                <button style='width:30px;' onclick='minus(".$row["menuid"].")'>-</button>
                <input id='".$row["menuid"]."'style='width:30px; text-align: center;' type='number' name='menu[".$row['menuid']."]' value=0>
                <button style='width:30px;' onclick='plus(".$row["menuid"].")'>+</button></div></div>";
            }
        } else {
        echo "0 results";
        }
    ?>
    </div>

    <div class="container" id="yum" style="margin-top:10px">
        <div class="row"><h1>ยำ</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='ยำ';";
        $result = mysqli_query($conn, $sql);

        $numrow = $numrow+mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row' style='margin-top:10px;'><div class='col-md-3'><img src='" . $row["image"]. "' width='100%' height='100%'></div>";
            echo "<div class='col-md-3'><h2>". $row["name"]. "</h2></div>";
            echo "<div class='col-md-3'><h2>". $row["price"]. " บาท</h2></div>";
            echo "<div class='col-md-3'>
                <button style='width:30px;' onclick='minus(".$row["menuid"].")'>-</button>
                <input id='".$row["menuid"]."'style='width:30px; text-align: center;' type='number' name='menu[".$row['menuid']."]' value=0>
                <button style='width:30px;' onclick='plus(".$row["menuid"].")'>+</button></div></div>";
            }
        } else {
        echo "0 results";
        }
    ?>
    </div>

    <div class="container" id="rice" style="margin-top:10px">
        <div class="row"><h1>ข้าว</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='ข้าว';";
        $result = mysqli_query($conn, $sql);

        $numrow = $numrow+mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row' style='margin-top:10px;'><div class='col-md-3'><img src='" . $row["image"]. "' width='100%' height='100%'></div>";
            echo "<div class='col-md-3'><h2>". $row["name"]. "</h2></div>";
            echo "<div class='col-md-3'><h2>". $row["price"]. " บาท</h2></div>";
            echo "<div class='col-md-3'>
                <button style='width:30px;' onclick='minus(".$row["menuid"].")'>-</button>
                <input id='".$row["menuid"]."'style='width:30px; text-align: center;' type='number' name='menu[".$row['menuid']."]' value=0>
                <button style='width:30px;' onclick='plus(".$row["menuid"].")'>+</button></div></div>";
            }
        } else {
        echo "0 results";
        }
    ?>
    </div>

    <div class="container" id="drink" style="margin-top:10px">
        <div class="row"><h1>เครื่องดื่ม</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='เครื่องดื่ม';";
        $result = mysqli_query($conn, $sql);

        $numrow = $numrow+mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row' style='margin-top:10px;'><div class='col-md-3'><img src='" . $row["image"]. "' width='100%' height='100%'></div>";
            echo "<div class='col-md-3'><h2>". $row["name"]. "</h2></div>";
            echo "<div class='col-md-3'><h2>". $row["price"]. " บาท</h2></div>";
            echo "<div class='col-md-3'>
                <button style='width:30px;' onclick='minus(".$row["menuid"].")'>-</button>
                <input id='".$row["menuid"]."'style='width:30px; text-align: center;' type='number' name='menu[".$row['menuid']."]' value=0>
                <button style='width:30px;' onclick='plus(".$row["menuid"].")'>+</button></div></div>";
            }
        } else {
        echo "0 results";
        }
    ?>
    </div>
    <div class="container" id="deseret" style="margin-top:10px">
        <div class="row"><h1>ของหวาน</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='ของหวาน';";
        $result = mysqli_query($conn, $sql);
        $numrow = $numrow+mysqli_num_rows($result);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='row' style='margin-top:10px;'><div class='col-md-3'><img src='" . $row["image"]. "' width='100%' height='100%'></div>";
                echo "<div class='col-md-3'><h2>". $row["name"]. "</h2></div>";
                echo "<div class='col-md-3'><h2>". $row["price"]. " บาท</h2></div>";
                echo "<div class='col-md-3'>
                    <button style='width:30px;' onclick='minus(".$row["menuid"].")'>-</button>
                    <input id='".$row["menuid"]."'style='width:30px; text-align: center;' type='number' name='menu[".$row['menuid']."]' value=0>
                    <button style='width:30px;' onclick='plus(".$row["menuid"].")'>+</button></div></div>";
            }
        }
    ?>
    </div>

    <input type="hidden" name="row"
    <?php
        echo "value='".$numrow."'"
    ?>>
    </div>
    <div style="height:100px"></div>
    <footer>
        <div class="container">
            <div class="row" style="text-align: center;">
                <div class="col-md-3"><button type="button" class="btn btn-warning" onclick="popup('pay')">เรียกเก็บเงิน</button></div>
                <div class="col-md-3 "><button type="button" class="btn btn-warning" onclick="popup('call')">ติดต่อพนักงาน</button></div>
                <div class="col-md-6"><button type="submit" class="btn btn-primary">ยืนยันการสั่ง</button></div>
            </div>
        </div>
    </footer>
<script>
    function minus(id){
        event.preventDefault();
        var quantity = document.getElementById(id);
        quantity.value = parseInt(quantity.value) - 1;
        if (parseInt(quantity.value) < 0) {
            quantity.value = 0;
        }
    }
    function plus(id){
        event.preventDefault();
        var quantity = document.getElementById(id);
        quantity.value = parseInt(quantity.value) + 1;
    }
    function typeselect(type){
        console.log(type)
        var soup = document.getElementById('soup')
        var fry = document.getElementById('fry')
        var drink = document.getElementById('drink')
        var deseret = document.getElementById('deseret')
        var deepfry = document.getElementById('deep-fry')
        var grill = document.getElementById('grill')
        var yum = document.getElementById('yum')
        var rice = document.getElementById('rice')

        soup.classList.add('hidden');
        fry.classList.add('hidden');
        drink.classList.add('hidden');
        deseret.classList.add('hidden');
        deepfry.classList.add('hidden');
        grill.classList.add('hidden');
        yum.classList.add('hidden');
        rice.classList.add('hidden');

        if (type == 'แกง'){
            soup.classList.remove('hidden');
        }
        else if(type == 'ผัด'){
            fry.classList.remove('hidden');
        }
        else if(type == 'เครื่องดื่ม'){
            drink.classList.remove('hidden');
        }
        else if(type == 'ของหวาน'){
            deseret.classList.remove('hidden');
        }
        else if(type == "ทอด"){
            deepfry.classList.remove('hidden');
        }
        else if(type == "ปิ้งย่าง"){
            grill.classList.remove('hidden');
        }else if(type == "ยำ"){
            yum.classList.remove('hidden');
        }else if(type == "ข้าว"){
            rice.classList.remove('hidden');
        }
        else{
            soup.classList.remove('hidden');
            fry.classList.remove('hidden');
            drink.classList.remove('hidden');
            deseret.classList.remove('hidden');
            deepfry.classList.remove('hidden');
            grill.classList.remove('hidden');
            yum.classList.remove('hidden');
            rice.classList.remove('hidden');
        }
    }
    function callemp(act){
        var selectElement = document.getElementById("promselect");
        var othertext = document.getElementById("othertext");
        var warn1 = document.getElementById("selectwarning1");
        var warn2 = document.getElementById("selectwarning2");
        var choice = document.getElementById("choice");

        if (selectElement.value === "" && act == "call"){
            warn1.style.display = 'block';
            return;
        }else if(selectElement.value === "other" && othertext.value === "" && act == "call"){
            warn2.style.display = 'block';
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

        document.getElementById('popupPay').style.display = 'none';
        document.getElementById('popupCall').style.display = 'none';
        document.getElementById('popupSuscess').style.display = 'block';
        selectElement.value = "";
        document.getElementById('othertext').value = '';
        document.getElementById('mass').value = '';
    }
    function popup(act){
        if (act == "pay"){
            document.getElementById('popupPay').style.display = 'block';
        }else if(act == "call"){
            document.getElementById('popupCall').style.display = 'block';
        }
        
    }
    function popclose(){
        document.getElementById('popupPay').style.display = 'none';
        document.getElementById('popupCall').style.display = 'none';
        document.getElementById('popupSuscess').style.display = 'none';
        document.getElementById("selectwarning1").style.display = 'none';
        document.getElementById("selectwarning2").style.display = 'none';
    }
    function toggleTextInput() {
            var selectElement = document.getElementById("promselect");
            var otherDiv = document.getElementById("otherInput");
            var othertext = document.getElementById("othertext");

            if (selectElement.value === "other") {
                otherDiv.style.display = "block";
            } else {
                otherDiv.style.display = "none";
                othertext.value="";
            }
        }
    
</script>
</form>
</body>
</html>