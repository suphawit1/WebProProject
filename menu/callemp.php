<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    session_start();
    $tableNo = $_SESSION['table_number'];
    $sql = "INSERT INTO emp_notify(tableNo,type) values($tableNo,'เรียกเก็บเงิน');";
    $result = mysqli_query($conn, $sql);
?>