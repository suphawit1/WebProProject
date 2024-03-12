<?php
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    session_start();
    $nowsession = session_id();
    $namesession = $_SESSION['name'];
    $rolesession = $_SESSION['role'];
    echo $namesession.$rolesession;
    if (isset($_POST['notify_id'])){
        $id = (int)$_POST['notify_id'];
        $sql = "SELECT type,tableNo FROM emp_notify WHERE notify_id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $table = $row['tableNo'];
        if ($row['type'] == "เรียกเก็บเงิน"){
            $sql = "SELECT session_id FROM table_session WHERE table_no =$table";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $sessionid = $row['session_id'];
                session_id($sessionid);
                session_destroy();
                $sql = "DELETE FROM table_session WHERE session_id = '$sessionid';";
                mysqli_query($conn, $sql);
            }
            session_start();
            $_SESSION['name'] = $namesession;
            $_SESSION['role'] = $rolesession;
            echo $namesession.$rolesession;
            $sql = "UPDATE cus_table SET amount=0, stutus=0 WHERE table_id = $table";
            mysqli_query($conn, $sql);
            $sql = "DELETE FROM menu_order WHERE table_no = $table";
            mysqli_query($conn, $sql);
        }
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