<!DOCTYPE html>
<html lang="en">
<style>
  #main{
    display: none;
  }.stocklist{
    border-radius:50px;
    background-color:aquamarine;
    border: 5px white solid;
  }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stork</title>
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <?php include 'onload.php'; ?>
    <script src="pop.js"></script>
</head>
<body>
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
      <div id="popupSuscess" class="popup-container">
        <div class="popup-content" style="text-align: center;">
          <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
          <img src="img/check_icon.png" width="150px" height="150px">
          <h2>ทำรายการเรียบร้อย</h2>
          <button type="button" class="btn btn-success" onclick="popclose()">ยืนยัน</button>
        </div>
      </div>
      <div class="container" style="text-align:center">
        <h1>รายการวัตถุดิบ</h1>
        <div class='row'>
        <?php
          $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
          $username = "admin"; //ตามที่กำหนดให้
          $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
          $dbname = "ProjectDB";    //ตามที่กำหนดให้
          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);

          $sql = "SELECT * FROM stock";
          $result = mysqli_query($conn, $sql);
          $num = 1;

          while($row = mysqli_fetch_assoc($result)) {
            if ($num > 3){
              echo "</div><div class='row'>";
              $num = 1;
            }
            echo "<div class='col-md-4 stocklist'><h2>".$row['name']."</h2>
            <img src='".$row['image']."' width='80%' height='60%'>
            <h3>จำนวน: ".$row['amount']." ".$row['unit_type']."<h3>
            </div>";
            $num++;
            }
        ?>
      </div>
    </div>
    <div id="load"><h1>Loading...</h1></div>
</body>
</html>