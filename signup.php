        <?php 
            require_once 'header.php';
        ?>

        <!-- body ------------------------------- -->
        <div class="signin-body-container">
            <div class="signin-body">
                <header>会員登録</header>
                <div class="signin-error">！ご確認ください。
                    <div class="signin-error-text ">
                        <div class="email-error-text">
                            ＊無効なメールアドレスです。
                        </div>
                        <div class="email-used-error-text">
                            ＊メールアドレスは既に登録されています。
                        </div>
                        <div class="phone-used-error-text">
                            ＊ 電話番号は既に登録されています。
                        </div>
                        <div class="password-error-shape-text">
                            ＊パスワードには少なくとも1つの英字が含まれている必要があります。
                        </div>
                        <div class="password-error-text">
                           ＊パスワードとパスワードの確認が一致しません。
                        </div>
                    </div>
                </div>
                <div class="sign-box">
                    <form class="sign-form" action="emailcheck.php" method="post">
                        <div class="name-input">
                            <div class="furigana-name ">
                              
                                <label for="furigana-sei">セイ:</label>
                                    <input type="text" id="furigana-sei" pattern="[\u30A1-\u30FA\u30FC\u30FD]*" name="furigana-sei" required title="カタカナで入力してください。">
                                <label for="furigana-mei">メイ:</label>
                                    <input type="text" id="furigana-mei" pattern="[\u30A1-\u30FA\u30FC\u30FD]*" name="furigana-mei" required title="カタカナで入力してください。">
                            </div>
                            <div class="kanji-name ">
                            <label for="kanji-sei">姓:</label>
                                <input type="text" id="kanji-sei" pattern="^[\p{Script=Hiragana}\p{Script=Han}\p{Script=Latin}A-Za-z\s]+$" name="kanji-sei" required title="漢字または英語を入力してください。">
                            <label for="kanji-mei">名:</label>
                                <input type="text" id="kanji-mei" pattern="^[\p{Script=Hiragana}\p{Script=Han}\p{Script=Latin}A-Za-z\s]+$" name="kanji-mei" required title="漢字または英語を入力してください。">
                            </div>
                        </div>
                  
                    <div class="gender-box">
                        <div class="">
                            <span>性別：</span>
                            <label for="other">男</label>
                                <input type="radio" id="other" value="male" name="gender" required>
                        </div>
                            <div class="">
                                <label for="male">女</label>    
                                    <input type="radio" id="male" value="female" name="gender" required>
                            </div>
                            <div class="">
                                <label for="female">他の</label>   
                                    <input type="radio" id="female" value="other" name="gender" required>
                            </div>
                    </div>
                    <div class="signin-mail-box">
                        <div class="email">
                            <label for="signin-email">メールアドレス:</label>
                                <input type="signin-email" inputmode="signin-email" id="signin-email" name="signin-email" required>
                        </div>
                        <div class="password">
    
                            <label for="password">パスワード：</label>
                                <input type="password" id="password" name="password" minlength="8" required>
                                <i class="hidden-icon fa-regular fa-eye-slash"></i>
                                <i class="show-icon fa-regular fa-eye"></i>
                        </div>
                        <div class="confirm-password">
                            <label for="confirm_password">パスワード確認：</label>
                                <input type="password" id="confirm_password" name="confirm_password" minlength="8" required>
                                <i class="hidden-icon fa-regular fa-eye-slash"></i>
                                <i class="show-icon fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="phone-number">
                        <div class="phone-number-input">
                        <span>電話番号:</span>
                            <input type="text" maxlength="3" inputmode="numeric" pattern="^0[0-9]*" id="phone-head" name="phone-head" required>
                            <span>-</span>
                            <input type="text" maxlength="4" inputmode="numeric" pattern="[0-9]*" id="phone-body" name="phone-body" required>
                            <span>-</span>
                            <input type="text" maxlength="4" inputmode="numeric" pattern="[0-9]*" id="phone-foot" name="phone-foot" required>
                            
                        </div>
                    </div>
                    <div class="address">
                        <div class="zip-code">
                            <label for="zip-code-head">郵便番号：</label>
                               <input type="text" maxlength="3"  pattern="[0-9]*"  inputmode="numeric" id="zip-code-head" name="zip-code-head" required>
                               <span>-</span>
                               <input type="text" maxlength="4"  pattern="[0-9]*" inputmode="numeric" id="zip-code-foot" name="zip-code-foot" required>
                        </div>
                        <label for="ken">都道府県：</label>
                           <input type="text" id="ken" name="ken" pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" required>
                        </br>
                        <label for="shi">住所１（市区町村）：</label>
                           <input type="text" id="shi" name="shi" pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" required>
                        </br>
                        <label for="banchi">住所２（番地）：</label>
                           <input type="text" id="banchi" name="banchi" pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" required>
                        </br>
                        <label for="tatemono">住所３（建物名）：</label>
                           <input type="text" id="tatemono" name="tatemono" pattern="^[a-zA-Z0-9\u3040-\u309F\u30A0-\u30FF\u31F0-\u31FF\p{Script=Han}０-９ \-]*$" required>
                        </br>
                    </div>
                        <button type="submit">登録</button>
                    </form>
                </div>
                
            </div>
        </div>
        <script src="data/js/signup.js"></script>


        <?php 
            require_once 'footer.php';
        ?>
