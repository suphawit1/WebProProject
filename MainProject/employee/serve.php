<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if (isset($_GET['role'])){
    $_SESSION["name"] = $_GET['role'];
    $_SESSION["role"] =$_GET['role'];
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting to Serve Food</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="load.css">
    <script src="pop.js"></script>
    <script>
        window.onload = function() {
            servelist();
        };
        function servelist() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("served").innerHTML = this.responseText;
            }
            xhttp.open("GET", "waitlist.php");
            xhttp.send();
        }
        setInterval(function() {
            document.getElementById("served").style.display = "block";
            servelist();
        }, 2000);
    </script>
    <?php include 'onload.php'; ?>
    <style>
        
        body {
            font-family: "K2D", sans-serif;
        }
        .alltable {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px;
        }

        .table-box {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            width: 240px;
        }

        .food-item {
            margin-bottom: 10px;
        }

        p {
            font-weight: bold;
        }
        .food-doing{
            font-weight: bold;
            color: gray;
        }
        .food-state {
            font-weight: bold;
            color: red;
        }

        .food-state-served {
            font-weight: bold;
            color: green;
        }
        #main, #served{
            display: none;
        }
    </style>
</head>

<body>
    <div class="loadblock" id="load">
        <div class="loader">
            <div class="loader-wheel"></div>
            <div class="loader-text"></div>
        </div>
    </div>
    <div id="noti"></div>
    <div id="main">
        <div id="popupnoti" class="popup-container">
            <div class="popup-content" style="text-align: center;">
            <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
            <img src="img//table_333521.png" width="150px" height="150px">
            <h2 id="tabletag"></h2>
            <h3 id="typetag"></h3>
            <p id="massagetag"></p>
            <button type="button" class="btn btn-success" onclick="noticonfirm()">ยืนยันการทำรายการสำเร็จ</button>
            <button type="button" class="btn btn-secondary" onclick="popclose()">ปิด</button>
            <form id='myForm'>
                <input type="hidden" id="notify_id" name="notify_id">
            </form>
            </div>
        </div>
        <div id="poporder" class="popup-container">
            <div class="popup-content" style="text-align: center;">
                <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
                <h2>ยืนยันการเสิร์ฟรายการอาหารเสร็จสิ้น</h2>
                <img src="images/serve.png" width="150px" height="150px">
                <h2 id="id"></h2>
                <h3 id="name"></h3>
                <button type="button" class="btn btn-success" onclick="orderconfirm()">ยืนยันการทำรายการสำเร็จ</button>
                <button type="button" class="btn btn-secondary" onclick="popclose()">ปิด</button>
                <form id='Form'>
                    <input type="hidden" id="menu_id" name="menu_id">
                    <input type="hidden" value=1 name="type">
                </form>
            </div>
        </div>
        <div id="popupSuscess" class="popup-container">
            <div class="popup-content" style="text-align: center;">
                <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
                <img src="img/check_icon.png" width="150px" height="150px">
                <h2>ทำรายการเรียบร้อย</h2>
                <button type="button" class="btn btn-success" onclick="popclose()">ยืนยัน</button>
            </div>
        </div>
    </div>
    <div id="served"></div>
</body>

</html>