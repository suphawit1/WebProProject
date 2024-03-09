<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }
        .row{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 5rem;
        }
        .box{
            border-radius: 15px;
            background-color: gray;
            width: 110%;
            padding: 2rem;
        }
        .box img{
            width: 90%;
            align-self: center;
            margin-left: 0.5rem;
        }

        .box h4{
            font-size: 200%;
            margin-bottom: 0.5rem;
            margin-left: 0.5rem;
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
            <h3 class="table" style="text-align: right;">table <?php echo $_SESSION["table"];?></h3>
        </header>
        <div class="row">
        <?php
            $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
            $username = "admin"; //ตามที่กำหนดให้
            $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
            $dbname = "ProjectDB";    //ตามที่กำหนดให้
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            

            $table = $_SESSION["table"];
            $sql ="SELECT DISTINCT menu FROM menu_order where table_no = $table";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                $menu = $row['menu'];
                echo "<div class='box'>";
                echo "<h4>" . $menu . "</h4>";
                $amount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(menu) FROM menu_order WHERE menu='$menu' AND table_no=$table;"));
                echo "<h4>x" . $amount["COUNT(menu)"] . "</h4>";
                $price = mysqli_fetch_assoc(mysqli_query($conn, "SELECT price FROM menu WHERE name='$menu';"));
                echo "<h4>" . $price["price"]*$amount["COUNT(menu)"] . " บาท</h4>";
                echo "</div>";
            }

            mysqli_close($conn);
            echo "</div>";
            echo "<footer>";
                echo "<button>เรียกเก็บเงิน</button>";
                echo "<button>ติดต่อพนักงาน</button>";
            echo "</footer>";
        ?>
    </div>
</body>
</html>