<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <link rel="icon" href="data/image/web-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="data/image/web-icon.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    <link rel="stylesheet" href="./data/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="data/css/base.css">
    <link rel="stylesheet" href="data/css/cart.css">
    <link rel="stylesheet" href="data/css/emailcheck.css">
    <link rel="stylesheet" href="data/css/footer.css">
    <link rel="stylesheet" href="data/css/header.css">
    <link rel="stylesheet" href="data/css/home.css">
    <link rel="stylesheet" href="data/css/index.css">
    <link rel="stylesheet" href="data/css/kaisyagaiyou.css">
    <link rel="stylesheet" href="data/css/login.css">
    <link rel="stylesheet" href="data/css/product.css">
    <link rel="stylesheet" href="data/css/signin.css">
    <link rel="stylesheet" href="data/css/forgotpass.css">
    <link rel="stylesheet" href="data/css/user.css">
    <link rel="stylesheet" href="data/css/oder.css">
    

    <title>株式会社タカヤマ</title>
</head>
<body>
    <div class="container">

        <!-- header--------------------------------------------------------------------- -->
        <div class="page-up-container"><button class="page-top-up"><i class="fa-solid fa-chevron-up"></i></button></div>
        <header class="page-header">
            <div class="menu">
                <a href="index.php" class="home-page">
                    <div class="icon">
                        <div class="logo"></div>
                        <div class="company-name">株式会社<span>タカヤマ</span></div>
                    </div>
                </a>
                <div class="nav-container">
                    <div class="nav-menu">
                    <ul class="nav">
                        <a href="kaisyagaiyou.php" class="nav-items"><li><i class="fa-regular fa-building"></i><span class="nav-items-text">会社概要</span></li></a>
                        <a href="index.php" class="nav-items"><li></i><span class="nav-items-text"><i class="fa-solid fa-toilet-portable"></i>商品</span></li></a>
                        <!-- <a href="" class="nav-items"><li><i class="fa-solid fa-circle-info"></i><span class="nav-items-text">質問する</span></li></a> -->
                    </ul>
                    <ul class="acc">
                        <a href="login.php" class="acc-items"><li><i class="fa-solid fa-user"></i><span class="acc-items-text">ログイン</span></li></a>
                        <a href="signup.php" class="acc-items"><li><i class="fa-solid fa-user-plus"> </i><span class="acc-items-text">会員登録</span></li></a>
                        
                    </ul>
                    <ul class="user">
                        <div class="user-items"><li><i class="fa-solid fa-user"></i> <span class="user-items-text"></span></li></div>
                        <a href="user.php" class="user-items"><li><i class="fa-solid fa-user-gear"></i><span class="acc-items-text">アカウント</span></li></a>
                        
                    </ul>
                    </div>
                     <div class="search">
                    <input type="text" placeholder="商品を検索">
                    
                    <div id="taiyou">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <!-- <ul class="search-history-box">
                        <header>探した商品</header>
                        <li class="search-history-text">ch 1511
                        </li>
                        <a href="" class="search-history-table"><footer>探した商品一覧<i class="fa-solid fa-arrow-right"></i></footer></a>
                    </ul> -->
                </div>
                </div>
                <div class="oder">
                <a href="cart.php" class="oder-items"><i class="fa-solid fa-cart-shopping"></i><span class="acc-items-text">かご</span></a>
                </div>
            </div>
        </header>
        <script src="data/js/header.js"></script>