<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
        $username = "admin"; //ตามที่กำหนดให้
        $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
        $dbname = "ProjectDB";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    
        $row = $_GET['row'];
        $order = $_GET['menu'];

        foreach (range(1, $row) as $i) {
            if ($order[$i] != 0){
                $sql = "SELECT name FROM menu WHERE menuid = $i;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row["name"]."จำนวน: ".$i." ที่<br>";
            }
        }
    ?>
</body>
</html>