<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting to Serve Food</title>

    <link rel="stylesheet" href="styles.css">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <style>
        .k2d-thin {
            font-family: "K2D", sans-serif;
            font-weight: 100;
            font-style: normal;
        }

        .k2d-extralight {
            font-family: "K2D", sans-serif;
            font-weight: 200;
            font-style: normal;
        }

        .k2d-light {
            font-family: "K2D", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .k2d-regular {
            font-family: "K2D", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .k2d-medium {
            font-family: "K2D", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .k2d-semibold {
            font-family: "K2D", sans-serif;
            font-weight: 600;
            font-style: normal;
        }

        .k2d-bold {
            font-family: "K2D", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .k2d-extrabold {
            font-family: "K2D", sans-serif;
            font-weight: 800;
            font-style: normal;
        }

        .k2d-thin-italic {
            font-family: "K2D", sans-serif;
            font-weight: 100;
            font-style: italic;
        }

        .k2d-extralight-italic {
            font-family: "K2D", sans-serif;
            font-weight: 200;
            font-style: italic;
        }

        .k2d-light-italic {
            font-family: "K2D", sans-serif;
            font-weight: 300;
            font-style: italic;
        }

        .k2d-regular-italic {
            font-family: "K2D", sans-serif;
            font-weight: 400;
            font-style: italic;
        }

        .k2d-medium-italic {
            font-family: "K2D", sans-serif;
            font-weight: 500;
            font-style: italic;
        }

        .k2d-semibold-italic {
            font-family: "K2D", sans-serif;
            font-weight: 600;
            font-style: italic;
        }

        .k2d-bold-italic {
            font-family: "K2D", sans-serif;
            font-weight: 700;
            font-style: italic;
        }

        .k2d-extrabold-italic {
            font-family: "K2D", sans-serif;
            font-weight: 800;
            font-style: italic;
        }

        body {
            font-family: "K2D", sans-serif;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: yellow;
            display: flex;
            flex-direction: row;
            align-items: center;
            height: 60px;
            box-shadow: 0px 0px 10px 0px black;
        }

        .headhome {
            margin-left: 30px;
        }

        .serve-button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .serve-button:hover {
            background-color: #45a049;
        }

        .alltable {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px;
        }

        .table-box {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            width: 200px;
        }

        .food-item {
            margin-bottom: 10px;
        }

        p {
            font-weight: bold;
        }

        .food-state {
            font-weight: bold;
            color: red;
            /* Default color for "รอเสิร์ฟ" state */
        }

        .food-state-served {
            font-weight: bold;
            color: green;
            /* Color for "เสิร์ฟแล้ว" state */
        }
    </style>
</head>

<body>
    <header>
        <h1 class="headhome"><img src="images/logo.png" style="height: 70px; width:auto;"></h1>
        <h1 class="headhome">ครัวเรือนไทย</h1>
    </header>
    <div class="alltable">
        <div class="table-box">
            <h1>โต๊ะ 1</h1>
            <div class="food-item">
                <p>อาหาร: กุ้งผัดกระเทียม</p>
                <p>สถานะ: <span class="food-state">รอเสิร์ฟ</span></p>
            </div>
            <div class="food-item">
                <p>อาหาร: แกงฮังเล</p>
                <p>สถานะ: <span class="food-state-served">เสิร์ฟแล้ว</span></p>
            </div>
        </div>

        <div class="table-box">
            <h1>โต๊ะ 2</h1>
            <div class="food-item">
                <p>อาหาร: กุ้งผัดกระเทียม</p>
                <p>สถานะ: <span class="food-state">รอเสิร์ฟ</span></p>
            </div>
            <div class="food-item">
                <p>อาหาร: แกงฮังเล</p>
                <p>สถานะ: <span class="food-state-served">เสิร์ฟแล้ว</span></p>
            </div>
        </div>

        <div class="table-box">
            <h1>โต๊ะ 3</h1>
            <div class="food-item">
                <p>อาหาร: กุ้งผัดกระเทียม</p>
                <p>สถานะ: <span class="food-state">รอเสิร์ฟ</span></p>
            </div>
            <div class="food-item">
                <p>อาหาร: แกงฮังเล</p>
                <p>สถานะ: <span class="food-state-served">เสิร์ฟแล้ว</span></p>
            </div>
        </div>

        <div class="table-box">
            <h1>โต๊ะ 4</h1>
            <div class="food-item">
                <p>อาหาร: กุ้งผัดกระเทียม</p>
                <p>สถานะ: <span class="food-state">รอเสิร์ฟ</span></p>
            </div>
            <div class="food-item">
                <p>อาหาร: แกงฮังเล</p>
                <p>สถานะ: <span class="food-state-served">เสิร์ฟแล้ว</span></p>
            </div>
        </div>

        <div class="table-box">
            <h1>โต๊ะ 5</h1>
            <div class="food-item">
                <p>อาหาร: กุ้งผัดกระเทียม</p>
                <p>สถานะ: <span class="food-state">รอเสิร์ฟ</span></p>
            </div>
            <div class="food-item">
                <p>อาหาร: แกงฮังเล</p>
                <p>สถานะ: <span class="food-state-served">เสิร์ฟแล้ว</span></p>
            </div>
        </div>

        <div class="table-box">
            <h1>โต๊ะ 6</h1>
            <div class="food-item">
                <p>อาหาร: กุ้งผัดกระเทียม</p>
                <p>สถานะ: <span class="food-state">รอเสิร์ฟ</span></p>
            </div>
            <div class="food-item">
                <p>อาหาร: แกงฮังเล</p>
                <p>สถานะ: <span class="food-state-served">เสิร์ฟแล้ว</span></p>
            </div>
        </div>

        <div class="table-box">
            <h1>โต๊ะ 7</h1>
            <div class="food-item">
                <p>อาหาร: กุ้งผัดกระเทียม</p>
                <p>สถานะ: <span class="food-state">รอเสิร์ฟ</span></p>
            </div>
            <div class="food-item">
                <p>อาหาร: แกงฮังเล</p>
                <p>สถานะ: <span class="food-state-served">เสิร์ฟแล้ว</span></p>
            </div>
        </div>
    </div>
</body>

</html>