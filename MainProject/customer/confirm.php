<?php session_start();
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "nHINsFGvVfVxb1fc5Pyz";
    $dbname = "ProjectDB";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="styles.css">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background-color: grey;
        }
        .menu{
            max-width: 50%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
            background-color: white;
        }
    </style>
</head>
    <header style="background-color: Yellow;">
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
    
    <div class="menu">
    <h1 style="text-align: Center;">ยืนยันรายการอาหาร</h1>
    <?php
        $row = $_GET['row'];
        $order = $_GET['menu'];

        foreach (range(1, $row) as $i) {
            if ($order[$i] != 0){
                $sql = "SELECT * FROM menu WHERE menuid = $i";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "<div class='box'>";
                echo "<h4>" . $row["name"] . "</h4>";
                echo "<h4>x" . $order[$i] . "</h4>";
                echo "<h4>" . $row["price"]*$order[$i] . " บาท</h4>";
                echo "</div>";
            }
        }
        mysqli_close($conn);
        ?>
        </div>
    </div>
    <footer>
        <div class="container">
            <form method="POST" action="orderinsert.php">
            <input type="hidden" name="row"
            <?php
                echo "value=".$_GET['row']."";
            ?>>
            <input type="hidden" name="menu"
            <?php
                echo "value='".json_encode($order)."'";
            ?>>
            <div class="row" style="text-align: center;">
                <div class="col-md-4"><button type="button" class="btn btn-warning" onclick="popup('pay')">เรียกเก็บเงิน</button></div>
                <div class="col-md-4 "><button type="button" class="btn btn-warning" onclick="popup('call')">ติดต่อพนักงาน</button></div>
                <div class="col-md-4"><button type="submit" class="btn btn-primary">ยืนยันการสั่ง</button></div>
            </div>
        </div>
    </footer>
    <script src="popupfoot.js"></script>
</body>
</html>