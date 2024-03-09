<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        header{
            position: fixed;
            width: 100%;
            
            background-color: yellow;
        }
        footer{
            text-align: right;
            position: fixed;
            bottom: 0%;
            background-color: grey;
            width: 100%;
            font-size: 200%;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="โลโก้ร้านอาหารไทย.png" alt="" style="max-width: 15%;">
            <h3 class="table" style="text-align: right;">table <?php echo $_SESSION["table"]?></h3>
        </header>
        <div class="menu">
        <?php
        $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
        $username = "admin";
        $password = "nHINsFGvVfVxb1fc5Pyz";
        $dbname = "ProjectDB";

// Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $row = $_GET['row'];
        echo $_GET['row'];
        $order = $_GET['menu'];

        foreach (range(1, $row) as $i) {
            if ($order[$i] != 0){
                $sql = "SELECT * FROM menu WHERE menuid = $i";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "<div class='box'>";
                echo "<h4>" . $row["name"] . "</h4>";
                echo "<h4>x" . $order[$i] . "</h4>";
                echo "<h4>" . $row["price"]*$order[$i] . " บาท</h4>";
                echo "</div>";
            }
        }
        mysqli_close($conn);
        ?>
        </div>
        <footer>
        
        <form method="GET" action="orderinsert.php">
            <input type="hidden" name="row"
            <?php
                echo "value=".$_GET['row']."";
            ?>>
            <input type="hidden" name="menu"
            <?php
                echo "value='".json_encode($order)."'";
            ?>>
            <button>เรียกเก็บเงิน</button>
            <button>ติดต่อพนักงาน</button>
            <button type = "submit">ยืนยันการสั่ง</button>
        </form>
        
        </footer>
    </div>
    
</body>
</html>