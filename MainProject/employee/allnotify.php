<!DOCTYPE html>
<html lang="en">
<style>
    #list, #main{
    display: none;
  }
  tr:hover:not(#head){
    cursor: pointer;
    background-color: gainsboro;
  }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <?php include 'onload.php'; ?>
    <link rel="stylesheet" href="load.css">
    <script src="pop.js"></script>
</head>
<body>
    <div id="noti"></div>
    <div id="list" style="text-align: center;"></div>
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
        <div id="popupSuscess" class="popup-container">
            <div class="popup-content" style="text-align: center;">
                <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
                <img src="img/check_icon.png" width="150px" height="150px">
                <h2>ทำรายการเรียบร้อย</h2>
                <button type="button" class="btn btn-success" onclick="popclose()">ยืนยัน</button>
            </div>
        </div>
    </div>
    <div class="loadblock" id="load">
        <div class="loader">
            <div class="loader-wheel"></div>
            <div class="loader-text"></div>
        </div>
    </div>
</body>
</html>