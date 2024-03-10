<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>รายการ การติดต่อเรียกของลูกค้า</h2>
    <div class="container">
    <table class="table">
        <thead><tr id="head">
        <th>หมายเลขโต๊ะ</th>
        <th>เรื่องที่ติดต่อ</th>
        <th>ข้อความเพื่มเติม</th>
        </tr></thead><tbody>
    <?php
        $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
        $username = "admin"; //ตามที่กำหนดให้
        $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
        $dbname = "ProjectDB";    //ตามที่กำหนดให้
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql ="SELECT notify_id,tableNo,type,massage FROM emp_notify";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr onclick=\"notipop('".$row['tableNo']."','".$row['type']."','".$row['massage']."','".$row['notify_id']."')\"><td>".$row['tableNo']."</td><td>".$row['type']."</td><td>".$row['massage']."</td></tr>";
        }
        mysqli_close($conn);
    ?>
    </tbody>
    </table>
    </div>
</body>
</html>