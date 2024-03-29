<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="styles.css">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</head>

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
<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    session_start();
    if (isset($_GET['table'])){
        $table = (int)$_GET['table'];
        $sql = "UPDATE cus_table SET stutus = 1 WHERE table_id = $table";
        $result = mysqli_query($conn, $sql);
        $_SESSION["table"] = $_GET['table'];
        $session_id = session_id();
        $sql = "INSERT INTO table_session(session_id,table_no) VALUES ('$session_id',$table)";
        $result = mysqli_query($conn, $sql);
    }
?>

<header style="background-color: #622c0b;">
    <div class="container-fluid" id="header-container">
        <div class="container-fluid">
            <div class="row" style="text-align: center;">
                <div class="col-md-1 header-element nohover" onclick="typeselect('')"><img src="images/logo.png" style="height: 70px; width:auto;"></div>
                <div class="col-md-1 header-element" onclick="typeselect('แกง')"><span class="font-header">แกง</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ผัด')"><span class="font-header">ผัด</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ทอด')"><span class="font-header">ทอด</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ปิ้งย่าง')"><span class="font-header">ปิ้ง/ย่าง</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ยำ')"><span class="font-header">ยำ</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ข้าว')"><span class="font-header">ข้าว</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('เครื่องดื่ม')"><span class="font-header">เครื่องดื่ม</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ของหวาน')"><span class="font-header">ของหวาน</span></div>
                <div class="col-md-2 header-element" onclick="window.location.href = 'order.php';"><span class="font-header">รายการอาหารที่สั่ง</span></div>
                <div class="col-md-1 header-element nohover"><span class="font-header">โต๊ะ <?php echo $_SESSION["table"]?></span></div>
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
    <form action="confirm.php" method="GET">
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
                <div class="col-md-4"><button type="button" class="btn btn-warning" onclick="popup('pay')">เรียกเก็บเงิน</button></div>
                <div class="col-md-4 "><button type="button" class="btn btn-warning" onclick="popup('call')">ติดต่อพนักงาน</button></div>
                <div class="col-md-4"><button type="submit" class="btn btn-primary">ยืนยันการสั่ง</button></div>
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
    
</script>
<script src="popupfoot.js"></script>
</form>
</body>
</html>