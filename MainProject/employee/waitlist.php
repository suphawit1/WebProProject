<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="load.css">
</head>
<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<body>
    <div class="alltable">
        <?php 
            $sql = "SELECT table_id FROM cus_table";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $table = (int)$row['table_id'];
                echo "<div class='table-box'><h1>โต๊ะ ".$table."</h1>";
                $sql = "SELECT * FROM menu_order WHERE table_no=$table ORDER BY CASE 
                WHEN status = 'รอเสิร์ฟ' THEN 1
                WHEN status = 'เสร็จสิ้น' THEN 2
                ELSE 3
                END;";
                $result1 = mysqli_query($conn, $sql);
                while($row1 = mysqli_fetch_assoc($result1)) {
                    echo "<div class='food-item'><p>อาหาร: ".$row1['menu']."</p>";
                    if ($row1['status'] == 'ยังไม่เสร็จ'){
                        echo "<p>สถานะ: <span class='food-doing'>ยังไม่เสร็จ</span></p></div>";
                    }else if ($row1['status'] == 'รอเสิร์ฟ'){
                        echo "<p>สถานะ: <span class='food-state'>รอเสิร์ฟ &nbsp;<span style='color:black; cursor:pointer;' onclick='orderpop(".$row1['idOrder'].",\"".$row1['menu']."\"   ,".$row1['table_no'].")'>&#10004;</span></span></p></div>";
                    }else if ($row1['status'] == 'เสร็จสิ้น'){
                        echo "<p>สถานะ: <span class='food-state-served'>เสิร์ฟแล้ว</span></p></div>";
                    }
                }
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>