<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $id = (int)$_POST['notify_id'];
    $sql = "DELETE FROM emp_notify WHERE notify_id = $id;";
    $result = mysqli_query($conn, $sql);
    
    
?>