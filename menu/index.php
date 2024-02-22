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
        $dbname = "test";    //ตามที่กำหนดให้
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        $sql = "SELECT * FROM concerts;";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo " " . $row["concert_id"]. " " . $row["location"]. 
            " " . $row["organizer_id"] . " " . $row["status"] . "<br>";
        }
        } else {
        echo "0 results";
        }
    ?>
</body>
</html>