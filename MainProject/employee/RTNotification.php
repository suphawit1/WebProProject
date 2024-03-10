<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</head>
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
  header {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    background-color: #622c0b;
    padding: 0px 20px;
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
  .notification {
    position: relative;
    display: inline-block;
  }

  .notification .badge {
    position: absolute;
    top: -1px;
    right: -14px;
    background-color: red;
    color: white;
    padding: 4px 8px;
    border-radius: 50%;
    font-size: 12px;
    }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 300px;
    width: fit-content;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    left: -30px;
    color: black;
    padding: 12px 16px;
    text-align: start;
  }

  .notification:hover .dropdown-content {
    display: block;
  }
  .notirow{
    cursor: pointer;
    border-bottom: 1px gray solid;
    display:flex;
    max-height: 100px;
    overflow: hidden;
  }
  .notirow:hover{
    background-color: gainsboro;
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
    .navbar {
    display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: center;
    column-gap: 20px;
      & a {
          text-decoration: none;
          color: #fff;
          font-size: x-large;
      }
    }
  
</style>
<?php
    session_start();
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
?>
<header>
  <img src="images/logo.png" alt="" width="70px">
    <div class="navbar">
        <a href="<?php 
        if ($_SESSION['role'] == "chef"){
          echo "order.php";
        }else{
          echo "serve.php";
        }
        ?>">รายการอาหารที่สั่ง</a>
        <a href="stock.php">รายการวัตถุดิบ</a>
        <div class="dropdown">
          <div class="notification">
            <a href="allnotify.php">รายการติดต่อจากลูกค้า</a>
            <i class="fa fa-bell"></i>
            <span class="badge"><?php
              $sql = "SELECT count(notify_id) FROM emp_notify";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              if ($row['count(notify_id)'] > 0){
                echo $row['count(notify_id)'];
              }
              
            ?></span>
            <div class="dropdown-content">
              <h3>ลูกค้าติดต่อ</h3>
              <?php
                $sql = "SELECT notify_id,tableNo,type,massage FROM emp_notify ORDER BY time ASC LIMIT 5;";
                $result = mysqli_query($conn, $sql);
                $numrow = mysqli_num_rows($result);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {

                  echo "<div class='notirow' onclick=\"notipop('".$row['tableNo']."','".$row['type']."','".$row['massage']."','".$row['notify_id']."')\">
                    <div style='text-align:center; width:20%'>
                      <img src='img/table_333521.png' width='70%' height='65%'>
                      <h5>โต๊ะ ".$row['tableNo']."</h5>
                    </div>
                    <div style='margin-left:10px'>
                      <h5>".$row['type']."</h5><p>".$row['massage']."</p>
                    </div></div>";
                }
                } else {
                echo "ไม่มีการติดต่อแจ้งเตือน";
                }
                mysqli_close($conn);
              ?>
              <div style="text-align:center">
                <a href="allnotify.php" style="color:blue; text-decoration: underline;">แสดงรายการทั้งหมด</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <h1><?php echo $_SESSION['name']?></h1>
</header>
<body>
</body>
</html>