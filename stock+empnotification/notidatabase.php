<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (isset($_POST['notify_id'])){
        $id = (int)$_POST['notify_id'];
        $sql = "DELETE FROM emp_notify WHERE notify_id = $id;";
        $result = mysqli_query($conn, $sql);
    }else{
        $sql = "SELECT COUNT(notify_id) FROM emp_notify";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $num = $row['COUNT(notify_id)'];
        echo $num;
    }
    
?>