<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    session_start();
    $tableNo = $_SESSION['table'];
    if ($_POST['problem'] != ""){
        $type = $_POST['problem'];
        $massage = $_POST['massage'];
        if($type == 'other'){
            $type = $_POST['other'];
        }
        $sql = "INSERT INTO emp_notify(tableNo,type,massage,time) values($tableNo,'$type','$massage',NOW());";
        $result = mysqli_query($conn, $sql);
    }else{
        $sql = "INSERT INTO emp_notify(tableNo,type,massage,time) values($tableNo,'เรียกเก็บเงิน','เรียกเก็บเงิน',NOW());";
        $result = mysqli_query($conn, $sql);
    }
    
?>