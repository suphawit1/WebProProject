<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</head>
    <div id="popupFail" class="popup-container">
        <div class="popup-content" style="text-align: center;">
            <span class="close-button" id="closePopupButton" onclick="popclose()">&times;</span>
            <img src="images/Flat_cross_icon.svg" width="150px" height="150px">
            <h2>ล็อกอินล้มเหลว</h2>
            <div style="display:flex">
                <button style="margin-right:5px" type="button" class="btn btn-success" onclick="window.location.href = 'index.html';">ยืนยัน</button>
                <form method="GET" action="order.php">
                    <input name="role" type="hidden" value="chef"></input>
                    <button style="margin-right:5px" type="submit" class="btn btn-secondary">BypassChef</button>
                </form>
                <form method="GET" action="serve.php">
                    <input name="role" type="hidden" value="emp"></input>
                    <button type="submit" class="btn btn-secondary">BypassEmp</button>
                </form>
            </div>
        </div>
    </div>
<?php 
    session_start();
    $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
    $username = "admin"; //ตามที่กำหนดให้
    $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
    $dbname = "ProjectDB";    //ตามที่กำหนดให้
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($user == $row['username']){
                if($pass == $row['password']){

?>

    <div id="popupSuscess" class="popup-container">
        <div class="popup-content" style="text-align: center;width:300px;">
            <form method="GET" action="<?php 
            if($row['role'] == "chef"){
                echo "order.php";
            }else{
                echo "serve.php";
            }
            $_SESSION["name"] = $row['name'];
            $_SESSION["role"] = $row['role'];
            ?>">
                <img src="images/check_icon.png" width="150px" height="150px">
                <h2>ล็อกอินสำเร็จ</h2>
                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </form>
        </div>
    </div>
<?php
                    echo "<script>document.getElementById('popupSuscess').style.display = 'block';</script>";
                    return;
                }
            }
        }
    }
    echo "<script>document.getElementById('popupFail').style.display = 'block';</script>";
?>
<body>
    
<script>
function popclose(){
    document.getElementById('popupSuscess').style.display = 'none';
    document.getElementById('popupFail').style.display = 'none';
}
</script>
</body>             
</html>