<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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
</style>
<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "SELECT table_id FROM cus_table where stutus=1 AND ADDTIME(open_order_time,'01:30:00') < NOW()";
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
            $sql = "UPDATE cus_table SET stutus = 1, open_order_time = CURTIME() WHERE table_id = '".$_SESSION['table_number']."';";
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
                <div class="col-md-3 header-element" onclick="typeselect('')"><span class="font-header">logo</span></div>
                <div class="col-md-2 header-element" onclick="typeselect('ต้มแกง')"><span class="font-header">ต้ม/แกง</span></div>
                <div class="col-md-2 header-element" onclick="typeselect('ผัดทอด')"><span class="font-header">ผัด/ทอด</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('เครื่องดื่ม')"><span class="font-header">เครื่องดื่ม</span></div>
                <div class="col-md-1 header-element" onclick="typeselect('ของหวาน')"><span class="font-header">ของหวาน</span></div>
                <div class="col-md-2 header-element"><span class="font-header">รายการอาหารที่สั่ง</span></div>
                <div class="col-md-1"><span class="font-header">โต้ะ <?php echo $_SESSION["table_number"]?></span></div>
            </div>
        </div>
    </div>
</header>
<body>
    <form action="testmenu.php" method="GET">
    <div class="container" id="tom/gang" style="margin-top:10px">
        <div class="row"><h1>ต้ม/แกง</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='ต้ม/แกง';";
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

    <div class="container" id="pat/tod" style="margin-top:10px">
        <div class="row"><h1>ผัด/ทอด</h1></div>
    <?php
        $sql = "SELECT * FROM menu WHERE type='ผัด/ทอด';";
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
    <input type="hidden" name="row"
    <?php
        echo "value='".$numrow."'"
    ?>>
    </div>
    <div style="height:100px"></div>
    <footer>
        <div class="container">
            <div class="row" style="text-align: center;">
                <div class="col-md-3"><button type="button" class="btn btn-warning" onclick="callemp()">เรียกเก็บเงิน</button></div>
                <div class="col-md-3 "><button type="button" class="btn btn-warning">ติดต่อพนักงาน</button></div>
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
        var soup = document.getElementById('tom/gang')
        var fry = document.getElementById('pat/tod')
        var drink = document.getElementById('drink')
        var deseret = document.getElementById('deseret')

        soup.classList.add('hidden');
        fry.classList.add('hidden');
        drink.classList.add('hidden');
        deseret.classList.add('hidden');
        if (type == 'ต้มแกง'){
            soup.classList.remove('hidden');
        }
        else if(type == 'ผัดทอด'){
            fry.classList.remove('hidden');
        }
        else if(type == 'เครื่องดื่ม'){
            drink.classList.remove('hidden');
        }
        else if(type == 'ของหวาน'){
            deseret.classList.remove('hidden');
        }
        else{
            soup.classList.remove('hidden');
            fry.classList.remove('hidden');
            drink.classList.remove('hidden');
            deseret.classList.remove('hidden');
        }
    }
    function callemp(){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'callemp.php', true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                console.log('PHP script executed successfully');
                console.log('Response from PHP:', xhr.responseText);
            } else {
                // Request failed
                console.error('Failed to execute PHP script');
            }
        };
        xhr.send();
    }
    
</script>
</form>
</body>
</html>