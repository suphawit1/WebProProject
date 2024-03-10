<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title></title>
</head>
<body>

    <div class="content">
        <hr>
        <table class="table  table-striped" style="width:80%">
        <thead>
            <th style="width:20%">รายการ</th>
            <th style="width:40%">เมนู</th>
            <th style="width:20%">โต๊ะที่</th>
            <th style="width:20%">สถานะ</th>
        </thead>
        <tbody>
    <?php
        $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
        $username = "admin"; //ตามที่กำหนดให้
        $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
        $dbname = "ProjectDB";    //ตามที่กำหนดให้
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (($_POST['status']) != 0){
            if ($_POST['status'] == 'undone'){
                $sql = "SELECT * FROM menu_order WHERE status='ยังไม่เสร็จ' ORDER BY status ASC";
            }else if($_POST['status'] == 'done'){
                $sql = "SELECT * FROM menu_order WHERE status='รอเสิร์ฟ' ORDER BY status ASC";
            }else if($_POST['status'] == 'finish'){
                $sql = "SELECT * FROM menu_order WHERE status='เสร็จสิ้น' ORDER BY status ASC";
            }
        }else{
            $sql ="SELECT * FROM menu_order ORDER BY status ASC";
        }
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['idOrder']."</td><td>".$row['menu']."</td><td>".$row['table_no']."</td><td><h2 ";
            if ($row['status'] == "ยังไม่เสร็จ"){
                echo "class='cook'>ยังไม่เสร็จ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:black; cursor:pointer;' onclick='orderpop(".$row['idOrder'].",\"".$row['menu']."\"   ,".$row['table_no'].")'>&#10004; แจ้งเสร็จ</span></h2></td></tr>";
            }else if ($row['status'] == "รอเสิร์ฟ"){
                echo "class='wait-for-serve'>รอเสิร์ฟ</h2></td></tr>";
            }else if ($row['status'] == "เสร็จสิ้น"){
                echo "class='served'>เสร็จสิ้น</h2></td></tr>";
            }
        }
    ?>
    </tbody>
    </table>
    </div>
</body>
</html>