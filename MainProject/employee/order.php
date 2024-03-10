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
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="load.css">
    <title>Order</title>
    <script src="pop.js"></script>
    <script>
        window.onload = function() {
            orderlist();
        };
        function orderlist() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("order").innerHTML = this.responseText;
            }
            const data = "status=<?php echo $_GET['status'] ?? 0 ?>";
            xhttp.open("POST", "orderlist.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(data);
        }
        setInterval(function() {
            document.getElementById("order").style.display = "block";
            orderlist();
        }, 2000);
    </script>
    <?php include 'onload.php'; ?>
</head>
<style>
    #main, #order{
        display: none;
    }
</style>
<body>
    <div id="noti"></div>
    <div class="loadblock" id="load">
        <div class="loader">
            <div class="loader-wheel"></div>
            <div class="loader-text"></div>
        </div>
    </div>
    <div id="main">
        <form id="myform" method="GET">
            <div class="btn-menu">
                <h2 class="status" data-value="undone">ยังไม่เสร็จ</h2>
                <h2 class="status" data-value="done">รอเสิร์ฟ</h2>
                <h2 class="status" data-value="finish">เสร็จสิ้น</h2>
            </div>
        </form>
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
                <h2>ยืนยันการทำรายการอาหารเสร็จสิ้น</h2>
                <img src="images/menu-png-4432666.png" width="150px" height="150px">
                <h2 id="id"></h2>
                <h3 id="name"></h3>
                <button type="button" class="btn btn-success" onclick="orderconfirm()">ยืนยันการทำรายการสำเร็จ</button>
                <button type="button" class="btn btn-secondary" onclick="popclose()">ปิด</button>
                <form id='Form'>
                    <input type="hidden" id="menu_id" name="menu_id">
                    <input type="hidden" id="menu_id" name="type">
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
    <div id="order"></div>
    </div>
</body>
<script>
    var statusElements = document.querySelectorAll('.status');
    statusElements.forEach(function(element) {
        element.addEventListener('click', function() {
            var value = this.getAttribute('data-value');
            document.getElementById('myform').innerHTML += '<input type="hidden" name="status" value="' + value + '">';
            document.getElementById('myform').submit();
        });
    });
</script>
</html>