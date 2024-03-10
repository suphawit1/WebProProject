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
    }else if (isset($_POST['menu_id'])){
        $id = (int)$_POST['menu_id'];
        if ((int)$_POST['type'] == 0){
            $sql = "UPDATE menu_order SET status='รอเสิร์ฟ' WHERE idOrder=$id";
        }else if((int)$_POST['type'] == 1){
            $sql = "UPDATE menu_order SET status='เสร็จสิ้น' WHERE idOrder=$id";
        }
        $result = mysqli_query($conn, $sql);
    }else{
        $sql = "SELECT COUNT(notify_id) FROM emp_notify";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $num = $row['COUNT(notify_id)'];
        echo $num;
    }
    
?>