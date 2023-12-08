        <?php 
            require_once 'header.php';
            require_once 'data/api/function.php';
        ?>

        <!-- body-------------------------------------- -->
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $formData = json_encode($_POST);
            $signUpEmail = $_POST['signin-email'];
            echo "<script>var formData ='" .$formData ."';</script>";
            };
        ?>
        <div class="email-check-body-container">
            <div class="email-cheack">
                <div class="email-check-box">
                    <div class="mail-check-items">
                        <header>ようこそ</header>
                        <div class="useradd">
                            <div class="useradd-icon">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div class="useradd-email">
                                <?php
                                echo $signUpEmail;
                                ?>
                            </div>
                        </div>
                        <div class="mail-check-input">
                            <input type="text" maxlength="4" inputmode="numeric" pattern="^0[0-9]*" id="verification-code" placeholder=" ">
                            <label for="verification-code">確認コード</label><br>
                            <div class="code-error">
                                 ＊コードが確認できません。
                            </div>
                            <div class="mail-check-mess">
                                <i class="fa-solid fa-circle-question"></i>私たちは、登録したメールアドレスに確認コードを送信しました。登録を完了するには、確認コードを入力してください。
                            </div>
                            <div class="resend">
                                メールを再送
                            </div>
                        </div>
                        <div class="userdd-send-btn">

                            <button>送る</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="data/js/emailcheck.js"></script>
       
 
    

        <?php 
            require_once 'footer.php';
        ?>
