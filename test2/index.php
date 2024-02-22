<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ภาษาไทย</h1>
    <?php
        $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
        $username = "admin"; //ตามที่กำหนดให้
        $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
        $dbname = "s226b";    //ตามที่กำหนดให้
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
        
        // close connection
        mysqli_close($conn);
    ?>
</body>
</html>