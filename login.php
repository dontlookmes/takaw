<?php 
            require_once 'header.php';
        ?>

        <!-- body--------------------------------------------------- -->
        <div class="login-body-container">
            <div class="login-body">
                <header>ログイン</header>
                <div class="login-box">
                    <div class="login-error-box"></div>
                    <form class="login-form" action="#" method="POST">
                    <div class="login-box-items">
                        <div class="login-input">

                            <input type="text" id="login" name="login" required placeholder="メールまたは電話番号" require>
                        </div>
                        
                        <div class="pass-input">

                            <input type="password" id="password" name="password" required placeholder="パスワード" require>
                            <i class="login-pass-hidden-icon fa-regular fa-eye-slash"></i>
                            <i class="login-pass-show-icon fa-regular fa-eye"></i>
                        </div>
    
                        
                    </div>
                    <div class="login-box-items-2">
                        <a class="repass" href="forgotpassword.php">パスワードを忘れの場合<i class="fa-solid fa-chevron-right"></i></a>
                    </div>
                        <button class="submit" type="submit">ログイン</button>
                    </form>
                </div>
                
            </div>
        </div>

        <script src="data/js/login.js"></script>

        <?php 
            require_once 'footer.php';
        ?>
