<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/home.css">

    <title>株式会社タカヤマ</title>
</head>
<body>
    <div class="container">

        <!-- header--------------------------------------------------------------------- -->
        <div class="page-up-container"><button class="page-top-up"><i class="fa-solid fa-chevron-up"></i></button></div>
        <header class="page-header">
            <div class="menu">
                <a href="../../index.php" class="home-page">
                    <div class="icon">
                        <div class="logo"></div>
                        <div class="company-name">株式会社<span>タカヤマ</span></div>
                    </div>
                </a>
                <div class="nav-container">
                    <div class="nav-menu">
                    <ul class="nav">
                        <a href="../../kaisyagaiyou.php" class="nav-items"><li><i class="fa-regular fa-building"></i><span class="nav-items-text">会社概要</span></li></a>
                        <!-- <a href="" class="nav-items"><li><i class="fa-solid fa-envelopes-bulk"></i><span class="nav-items-text">お会い合わせ</span></li></a>
                        <a href="" class="nav-items"><li><i class="fa-solid fa-circle-info"></i><span class="nav-items-text">質問する</span></li></a> -->
                    </ul>
                    <ul class="acc">
                        <a href="../../login.php" class="acc-items"><li><i class="fa-solid fa-user"></i><span class="acc-items-text">ログイン</span></li></a>
                        <a href="../../signup.php" class="acc-items"><li><i class="fa-solid fa-user-plus"> </i><span class="acc-items-text">会員登録</span></li></a>
                        
                    </ul>
                    <ul class="user">
                        <div href="../../login.php" class="user-items"><li><i class="fa-solid fa-user"></i> <span class="user-items-text">takayama様</span></li></div>
                        <a href="../../user.php" class="user-items"><li><i class="fa-solid fa-user-gear"></i><span class="acc-items-text">アカウント</span></li></a>
                        
                    </ul>
                    </div>
                     <div class="search">
                    <input type="text" placeholder="商品を検索">
                    
                    <div id="taiyou">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <ul class="search-history-box">
                        <header>探した商品</header>
                        <li class="search-history-text">ch 1511
                        </li>
                        <a href="" class="search-history-table"><footer>探した商品一覧<i class="fa-solid fa-arrow-right"></i></footer></a>
                    </ul>
                </div>
                </div>
                <div class="oder">
                <a href="../../cart.php" class="oder-items"><i class="fa-solid fa-cart-shopping"></i><span class="acc-items-text">かご</span></a>
                </div>
            </div>
        </header>
        <script type="module">
            import { saveToLocalStorage, getFromLocalStorage } from '../js/localstorage.js';
    
        </script>
