<head>
    <title>Pizza Order System</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!-- 定義 格式 -->
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>

<!-- 背景為灰色 且 淡4階 -->
<body class="grey lighten-4"> 

    <!-- 多了 最上面一條（通常放關於我們之類的），背景為白色 且 沒有陰影-->
    <nav class="white z-depth-0"> 

        <!-- div分段落， container是 把東西包在一起-->
        <div class="container">

            <!-- a代表這東西可以按 #代表按了回到本頁 -->
            <!-- brad-logo 是 Materialize的套件（應該是設定字型） -->
            <a href="#" class="center brand-logo brand-text">Pizza Order</a>

            <!-- ul表示 無排序的元素，可以包涵<li> <ol> <ul> -->
            <!-- id 表示 變數名稱，所以這裡的"nav-mobile代表整個包起來的名稱" -->
            <!-- right 表示在右邊， hide-on-small-and-down是 Materialize的套件 -->
            <ul id="nav-mobile" class="right hide-on-small-and-down">

                <!-- btn為 按鈕 -->
                <li><a href="#" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    
    </nav> 
    <!--  -->