<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    session_start();

    $row = $_POST['row'];
    $order = json_decode($_POST['menu'], true);
    $table = (int)$_SESSION["table"];

    foreach (range(1, $row) as $i) {
        if ($order[$i] != 0){
            $sql = "SELECT name,price FROM menu WHERE menuid = $i";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $price = $row['price'];
            
            foreach(range (1, $order[$i])as $j){
                $sql = "INSERT INTO menu_order(menu,table_no) VALUES ('$name', $table)";
                $result = mysqli_query($conn, $sql);
                $amount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT amount FROM cus_table WHERE table_id = $table;"))['amount'];
                $sql = "UPDATE cus_table SET amount = $amount+$price WHERE table_id = $table";
                $result = mysqli_query($conn, $sql);
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="styles.css">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>
<div id="popupSuscess" class="popup-container" style="display:block;">
    <div class="popup-content" style="text-align: center;">
        <img src="images/check_icon.png" width="150px" height="150px">
        <h2>สั่งอาหารเรียบร้อย</h2>
        <form method="POST" action="menu.php">
            <button type="submit" class="btn btn-success">ยืนยัน</button>
        </form>
        
    </div>
</div>
</body>
</html>
